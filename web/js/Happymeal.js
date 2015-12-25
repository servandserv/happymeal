/*jslint skipme:true*/
(function(w){
	
	this.Happymeal = {};

	var extend = function(obj) {
		// http://stackoverflow.com/questions/728360/most-elegant-way-to-clone-a-javascript-object
		if(arguments.length == 1) return extend( obj, this );
		if (null == obj || "object" != typeof obj) return obj;
		var source, prop;
		for (var i = 1, length = arguments.length; i < length; i++) {
			source = arguments[i];
			for (prop in source) {
				if (!Object.prototype.hasOwnProperty.call(obj, prop)) {
					obj[prop] = source[prop];
				}
			}
		}
		if(typeof obj["initialize"] == "function" ) {
			obj["initialize"](obj);
		}
		return obj;
	};
	
	/**
	 * http://www.peej.co.uk/articles/rich-user-experience.html
	 */ 
	var httpRequest = function() {
		if (typeof XMLHttpRequest != 'undefined') {
			return new XMLHttpRequest();
		} try {
			return new ActiveXObject("Msxml2.XMLHTTP");
		} catch (e) {
			try {
				return new ActiveXObject("Microsoft.XMLHTTP");
			} catch (e) {}
		}
		return false;
	};
	
	var getXMLFromString = function(s) {
		if(window.ActiveXObject) {
			var xml;
			xml=new ActiveXObject("Microsoft.XMLDOM");
			xml.async=false;
			xml.loadXML(s);
			return xml;
		} else if(window.DOMParser) { 
			var parser = new DOMParser();  
			return parser.parseFromString(s,'text/xml');
		} else {
			console.log("Загрузка XML не поддерживается браузером");
			return null;
		}
	};
	/**
	 * http://werxltd.com/wp/2010/05/13/javascript-implementation-of-javas-string-hashcode-method/
	 */
	Happymeal.hashCode = function(str){
	    var ch;
	    var hash = 0;
	    if (str.length == 0) return hash;
	    for (i = 0; i < str.length; i++) {
	        ch = str.charCodeAt(i);
	        hash = ((hash<<5)-hash)+ch;
	        hash = hash & hash; // Convert to 32bit integer
	    }
	    return hash;
	}
	
	Happymeal.escapeHTML = function (text) {
        var map = {
            /*'&': '&amp;',*/
            '<': '&lt;',
            '>': '&gt;'/*,
            '"': '&quot;',
            "'": '&#039;'*/
        };

        return text.toString().replace(/[<>]/g, function(m) { return map[m]; });
    },
	
	Happymeal.preserve = function(ns, ns_string) {
		var parts = ns_string.split("."),
		parent = ns,
		pl, i;
		pl = parts.length;
		for(i=0;i<pl;i++) {
			if(typeof parent[parts[i]] == "undefined") {
				parent[parts[i]] = {};
			}
			parent = parent[parts[i]];
		}
		return parent;
	};
	
	Happymeal.Locator = (function(){
		var objects = {};
		
		var locator =  function(key,f) {
			if(!f && typeof objects[key] == "function") {
				return objects[key]();
			} else if(f) {
				objects[key] = f;
			}
		}
		return locator;
	}());
	
	Happymeal.Storage = (function(){
	    return {
	        prefix: "hm",
	        length: function() {
	            return sessionStorage.length;
	        },
	        key: function(key) {
	            var res = sessionStorage.key( key ) 
                if( res != null ) {
                    res = JSON.parse( res );
                }
                return res;
	        },
	        getItem: function( key ) {
                var res = sessionStorage.getItem( this.prefix+":"+key );
                if( res != null ) {
                    res = JSON.parse( res );
                }
                return res;
            },
            setItem: function( key, data ) {
                var str = JSON.stringify( data );
                sessionStorage.removeItem( this.prefix+":"+key );
                sessionStorage.setItem( this.prefix+":"+key, str );
            },
            removeItem: function( key ) {
                sessionStorage.removeItem( this.prefix+":"+key );
            },
            clear: function() {
                sessionStorage.clear();
            }
        }
	}());
	
	Happymeal.Mediator = (function() {
		// Storage for our topics/events
		var channels = {};
		// Subscribe to an event, supply a callback to be executed // when that event is broadcast
		var subscribe = function(channel, fn, context) {
			if (!channels[channel])
				channels[channel] = [];
			channels[channel].push({context: context || this, callback: fn});
			return this;
		};
		// Publish/broadcast an event to the rest of the application
		var publish = function(channel) {
			if (!channels[channel]) {
				//console.log(arguments);
				return false;
			}
			var args = Array.prototype.slice.call(arguments, 1);
			for (var i = 0, l = channels[channel].length; i < l; i++) {
				var subscription = channels[channel][i];
				subscription.callback.apply(subscription.context, args);
			}
			return this;
		};
		var clear = function(args) {
			if(args && args.length) {
				for (var i = 0, l = args.length; i < l; i++) {
					if(channels[args[i]]) {
						delete channels[args[i]];
					}
				}
			} else {
				channels = [];
			}
		}
		return {
			toObject: function(obj) {
				obj.clear = clear;
				obj.publish = publish;
				obj.subscribe = subscribe;
				return obj;
			},
			clear: clear,
			publish: publish,
			subscribe: subscribe
		};
	}());
	
    Happymeal.Locator("Happymeal.PubSub",function(args) {
        return (function(args) {
            var topics = {};
            var subUid = -1;
            var pubsub = {
                subscribe: function(topic, func) {
                    if (!topics[topic]) {
                        topics[topic] = [];
                    }
                    var token = (++subUid).toString();
                    topics[topic].push({
                        token: token,
                        func: func
                    });
                    return token;
                },
                publish: function(topic, args) {
                    if (!topics[topic]) {
                        return false;
                    }
                    //setTimeout(function() {
                        var subscribers = topics[topic],
                        len = subscribers ? subscribers.length : 0;

                        while (len--) {
                            subscribers[len].func(topic, args);
                        }
                    //}, 0);
                    return true;
                },
                unsubscribe: function(token) {
                    for (var m in topics) {
                        if (topics[m]) {
                            for (var i = 0, j = topics[m].length; i < j; i++) {
                                if (topics[m][i].token === token) {
                                    topics[m].splice(i, 1);
                                    return token;
                                }
                            }
                        }
                    }
                    return false;
                },
                topics: function() {
                    return topics;
                },
                extend: extend
            };
            return pubsub;
        }(args));
	});
    
	Happymeal.preserve(Happymeal,"Port.Adaptor.HTTP");
	Happymeal.Port.Adaptor.HTTP = (function(){
		var request = function(args) {
			var body;
			if(args.method === "POST" && (args.content === "application/xml"||args.content === "text/xml")) {
				body = "<?xml version='1.0' encoding='utf-8'?>";
				body += args.entity.toXmlStr();
			} else if( args.method === "POST" ) {
				if(typeof args.entity.toJSON === "function" ) {
					body = JSON.stringify( args.entity.toJSON() );
				} else {
					body = JSON.stringify( args.entity );
				}
			}
			var http = httpRequest();
			http.open(args.method,args.url,true);
			http.setRequestHeader('Accept', args.accept || "application/json");
			if(args.content) http.setRequestHeader('Content-type', args.content);
			if(args.override) http.setRequestHeader('X-HTTP-Method-Override', args.override);
			http.onreadystatechange = function() {
				if (http.readyState == 4) {
					if( http.status == 200 ) {
						args.callback(http);
					} else if (http.status == 404) {
						Happymeal.Mediator.publish( "ErrorOccured",{ message: http.responseText });
					} else {
						Happymeal.Mediator.publish( "ErrorOccured",{ message: http.responseText });
					}
				}
			}
			http.send(body);
		};
		
		var get = function( args ) {
			args.method = "GET";
			request(args);
		};
		
		var post = function( args ) {
			args.method = "POST";
			request(args);
		};
		
		var put = function( args  ) {
			args.method = "POST";
			args.override = "PUT";
			request(args);
		};
		
		var patch = function( args ) {
			args.method = "POST";
			args.override = "PATCH";
			request(args);
		};
		
		var del = function( args ) {
			args.method = "POST";
			args.override = "DELETE";
			request(args);
		};
		
		return Happymeal.Mediator.toObject({
			get: get,
			post: post,
			put: put,
			patch: patch,
			del: del,
		});
	}());
	
	
	
	Happymeal.preserve(Happymeal,"Port.Adaptor.Data.XML.Schema");
	Happymeal.Port.Adaptor.Data.XML.Schema.AnyComplexType = {
		toJSON: function() {
			var anyComplexType = this.getAll();
			this.JSON = this.JSON || {};
			var len = Object.keys(anyComplexType).length;
			var retrieve = function(obj) {
				if ( obj && typeof obj === "object" && typeof obj.toJSON !== "undefined" ) {
					return obj.toJSON();
				} else {
					return obj;
				}
			};
			var prop;
			for( prop in anyComplexType ) {
				if(anyComplexType[prop] instanceof Array) {
					var target = [],
						i, obj,
						length = anyComplexType[prop].length;
					for(i = 0;i<length;i++) {
						target.push(retrieve(anyComplexType[prop][i]));
					}
					if(len === 1) {
						this.JSON = target;
					} else {
						this.JSON[prop] = target;
					}
				} else {
					this.JSON[prop] = retrieve(anyComplexType[prop]);
				} 
			}
			return this.JSON;
		},
		
		fromXmlStr: function(xmlstr,callback) {
			var strict = true,
  				parser = sax.parser(strict),
  				self = this,
  				ROOT;
  			parser.onopentag = function(node) {
  				ROOT = node.name;
  				self.fromXmlParser(parser,null,callback);
  			}
  			parser.write(xmlstr).close();
		},
	};
	
	Happymeal.Port.Adaptor.Data.XML.Schema.AnyComplexTypeValidator = {
	    simpleTypes: [],
	    complexTypes: [],
	    validate: function() {
	        return true;
	    },
	    assertType: function(uri,type,pubsub) {
	        if(type.URI != uri) {
	            return false;
	        } else return true;
	    },
	    assertMinOccurs: function(occurence,prop,pubsub) {
	        var valid = true;
	        switch(occurence) {
	            case "0":
	                break;
	            case "1":
	                if(prop === null || (prop instanceof Array && prop.length === 0)) valid = false;
	                break;
	            default:
	                if(!prop instanceof Array && prop.length < occurence) valid = false;
	        }
	        return valid;
	    },
	    assertMaxOccurs: function(occurence,prop,pubsub) {
	        var valid = true;
	        switch(occurence) {
	            case "1":
	                if(prop instanceof Array) valid = false;
	                break;
	            case "unbounded":
	                if(!prop instanceof Array) valid = false;
	                break;
	            default:
	                if(!prop instanceof Array && prop.length > occurence) valid = false;
	        
	        }
	        return valid;
	    },
	    assertFixed: function(fixed,prop,pubsub) {
	        return prop == fixed;
	    }
	}
	
	Happymeal.Port.Adaptor.Data.XML.Schema.AnySimpleType = {
		toJSON: function() {
			this.JSON = {};
			this.JSON[this.ROOT] = this.get();
			return this.JSON;
		},
		fromXmlStr: function(xmlstr,callback) {
			var strict = true,
  				parser = sax.parser(strict),
  				self = this;
  			parser.onopentag = function(node) {
  				self.ROOT = node.name;
  				self.fromXmlParser(parser,null,callback);
  			}
  			parser.write(xmlstr).close();
		},
	}
	
	Happymeal.Port.Adaptor.Data.XML.Schema.AnySimpleTypeValidator = {
	    assertSimple: function(type,val,pubsub) {
	        switch( type ) {
	            case "Int":
	            case "Integer":
	                return parseInt(val,10)==val;
	            case "Float":
	            case "Double":
	                return parseFloat(val,10)==val;
	            case "Boolean":
	                return val == "true" || val == "false" || val == 0 || val == 1;
	            default:
	                return true;
	        }
	    },
	    assertEnumeration: function(arr,val,pubsub) {
	        return arr.indexOf(val) >= 0;
	    },
	    assertMinInclusive: function(min,val,pubsub) {
	        return parseFloat(min) <= parseFloat(val);
	    },
	    assertMinExclusive: function(min,val,pubsub) {
	        return parseFloat(min) < parseFloat(val);
	    },
	    assertMaxInclusive: function(max,val,pubsub) {
	        return parseFloat(max) >= parseFloat(val);
	    },
	    assertMaxExclusive: function(max,val,pubsub) {
	        return parseFloat(max) > parseFloat(val);
	    },
	    assertMinLength: function(len,val,pubsub) {
	        return String(val).length >= len;
	    },
	    assertMaxLength: function(len,val,pubsub) {
	        return String(val).length <= len;
	    },
	    assertLength: function(len,val,pubsub) {
	        return String(val).length == len;
	    },
	    assertPattern: function(reg,val,pubsub) {
	        var expr = new RegExp(reg);
	        return expr.test(val);
	    },
	    assertNull: function(val,pubsub) {
	        return val === null || val === '';
	    }
	}

    Happymeal.XMLView = (function(){
		var templates = {};
		var waits = {};
		
		var transformXslt = function (source, style) {
			if(!source.documentElement) source = getXMLFromString(source);
			if(!style.documentElement) style = getXMLFromString(style);
			if(window.ActiveXObject) {
				return source.transformNode(style);
			} else if(window.XSLTProcessor) {
				var xsltProcessor=new XSLTProcessor();
				xsltProcessor.importStylesheet(style);
				var resultDocument = xsltProcessor.transformToDocument(source);
				return resultDocument;
			} else {
				Happymeal.Mediator.publish("ErrorOccured",{
					msg:"XSLT Transformation error"}
				);
				return null;
			}  
		};
		
		var render = function(model) {
		    this.model = model;
		    var xml = model.toXmlStr();
			if(!templates[this.template]) {
				if(!waits[this.template]) waits[this.template] = [];
				waits[this.template].push({view:this,data:xml,model:model});
			} else {
				var temp = templates[this.template];
				var el = this.element || document.getElementById(this.elementId);
				el.innerHTML = transformXslt(xml,temp).documentElement.innerHTML;
				this.bind(el,model);
			}
		};
		
		var initialize = function() {
			// подписываемся на события
			for (prop in this.events) {
				this.subscribe(prop,this.events[prop],this);
			}
			// подгружаем шаблон, если он еще не был подгружен
			if(!templates[this.template]) {
				// только внешние шаблоны
				var adaptor = Happymeal.Port.Adaptor.HTTP.extend({});
				adaptor.get({
					url: this.template,
					callback: function(http) {
						templates[this.url] = http.responseXML;
						if(waits[this.url]) {
							for(var i=0; i<waits[this.url].length; i++) {
								waits[this.url][i].view.render(waits[this.url][i].model);
							}
							waits[this.url] = [];
						}
					}
				});
			}
		};
		/** стандартный метод где навешиваем всякие события на интерфейс */
		var bind = function() {};
		
		return Happymeal.Mediator.toObject({
			render: render,
			bind: bind,
			initialize: initialize
		});
		
	}());
	
	Happymeal.TemplateEngine  = function(html, options) {
    	var re = /<%([^%>]+)?%>/g, reExp = /(^( )?(if|for|else|switch|case|break|{|}))(.*)?/g, code = 'var r=[];\n', cursor = 0, match;
    	var add = function(line, js) {
        	js? (code += line.match(reExp) ? line + '\n' : 'r.push(' + line + ');\n') :
            	(code += line != '' ? 'r.push("' + line.replace(/"/g, '\\"') + '");\n' : '');
        	return add;
    	}
    	while(match = re.exec(html)) {
        	add(html.slice(cursor, match.index))(match[1], true);
        	cursor = match.index + match[0].length;
    	}
    	add(html.substr(cursor, html.length - cursor));
    	code += 'return r.join("");';
    	return new Function(code.replace(/[\r\t\n]/g, '')).apply(options);
	};
	
	Happymeal.HTMLView = (function(){
		var templates = {};// шаблоны
		var waits = {};
		
		/** отрисовка интерфейса */
		var render = function(model) {
		    var data = model.toJSON();
		    this.model = model;
		    if(typeof this.template == "function"){
		        var el = this.element || document.getElementById(this.elementId);
		        el.innerHTML = this.template(data);
		        this.bind(el,model);
			} else if(!templates[this.template]) {
				if(!waits[this.template]) waits[this.template] = [];
				waits[this.template].push({view:this,data:data,model:model});
			} else {
				var tmpl = _.template(templates[this.template]);
				var el = this.element || document.getElementById(this.elementId);
				el.innerHTML = tmpl(data);
				this.bind(el,model);
			}
		}
		/** тут регистрируемся на всякие события модели/адапторов*/
		var initialize = function() {
			var self = this;
			// подписываемся на события
			for (prop in this.events) {
				this.subscribe(prop,this.events[prop]);
			}
			// подгружаем шаблон, если он еще не был подгружен
			if(typeof this.template != "function" && !templates[this.template]) {
				// если локальная ссылка то получаем ее содержимое через дом
				if(this.template.substr(0,1) === "#") {
					templates[this.template] = document.getElementById(this.template.substr(1)).innerHTML;
				} else {
					var adaptor = Happymeal.Port.Adaptor.HTTP.extend({});
					adaptor.get({
						url: this.template,
						callback: function(http) {
							templates[this.url] = http.responseText;
							if(waits[this.url]) {
								for(var i=0; i<waits[this.url].length; i++) {
									waits[this.url][i].view.render(waits[this.url][i].model);
								}
								waits[this.url] = [];
							}
						}
					});
				}
			}
		};
		/** стандартный метод в котором навешиваем всякие события на интерфейс после того как отрисовали его */
		var bind = function() {};
		
		return Happymeal.Mediator.toObject({
			events: {},
			render: render,
			bind: bind,
			initialize: initialize
		});
		
	}());
	
	Happymeal.SXSLTView = (function(){
		var templates = {};// шаблоны
		var waits = {};
		
		/** отрисовка интерфейса */
		var render = function(model) {
		    var self = this;
		    var el = this.element || document.getElementById(this.elementId);
		    var adaptor = Happymeal.Port.Adaptor.HTTP.extend({});
			adaptor.post({
				url: this.template,
				content: "application/xml",
				entity: model,
				callback: function(http) {
				    var body = getXMLFromString(http.responseText);
				    el.innerHTML = body.documentElement.innerHTML;
				    self.bind(el,model);
				}
			});
		}
		/** тут регистрируемся на всякие события модели/адапторов*/
		var initialize = function() {
			var self = this;
			// подписываемся на события
			for (prop in this.events) {
				this.subscribe(prop,this.events[prop]);
			}
		};
		/** стандартный метод в котором навешиваем всякие события на интерфейс после того как отрисовали его */
		var bind = function() {};
		
		return Happymeal.Mediator.toObject({
			events: {},
			render: render,
			bind: bind,
			initialize: initialize
		});
		
	}());
	
	Happymeal.Model = (function() {
	    return {}
	}());
	
	Happymeal.Mediator.extend = Happymeal.Port.Adaptor.HTTP.extend = Happymeal.XMLView.extend = Happymeal.HTMLView.extend = Happymeal.Model.extend = extend;
	Happymeal.SXSLTView.extend = extend;
	Happymeal.Storage.extend = extend;
	Happymeal.Port.Adaptor.Data.XML.Schema.AnyComplexType.extend = extend;
	Happymeal.Port.Adaptor.Data.XML.Schema.AnyComplexTypeValidator.extend = extend;
	Happymeal.Port.Adaptor.Data.XML.Schema.AnySimpleType.extend = extend;
	Happymeal.Port.Adaptor.Data.XML.Schema.AnySimpleTypeValidator.extend = extend;
	
}(window));