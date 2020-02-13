<?xml version="1.0" encoding="UTF-8"?>

<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
				xmlns:tmp="com:servandserv:happymeal:tmp"
				xmlns:exsl="http://exslt.org/common"
				extension-element-prefixes="exsl"
				exclude-result-prefixes="tmp"
				xmlns="com:servandserv:happymeal:tmp"
				version="1.0">

	<xsl:output
		media-type="text/xml"
		method="xml"
		encoding="UTF-8"
		indent="no"
		omit-xml-declaration="yes"  />
	<xsl:strip-space elements="*"/>
	
	<xsl:param name="MODE" />
	
	<xsl:variable name="smallcase" select="'abcdefghijklmnopqrstuvwxyz'" />
	<xsl:variable name="uppercase" select="'ABCDEFGHIJKLMNOPQRSTUVWXYZ'" />
	
	<xsl:variable name="NS" select="/tmp:schema/@namespace" />

	<xsl:template match="tmp:schema">;(function(h) {
		<!--xsl:apply-templates select="tmp:*" mode="DATA-CLASS" /-->
		<!-- 
			Изменяем логику построения, в отличие от php генерации строим объекты от базовых типов.
			В основе всегда дежат базовые типы. находим узлы которые потроены на них
			затем раскручиваем в обратную сторону
		-->
		<!--xsl:apply-templates select="//tmp:*[@typeClass='com\servandserv\happymeal\XML\Schema\AnyComplexType']" mode="OBJECT" /-->
		<xsl:for-each select="//tmp:element[@class]">
			<xsl:variable name="first-ancestor">
				<xsl:apply-templates select="." mode="FIRST_ANCESTOR" />
			</xsl:variable>
			<xsl:message><xsl:value-of select="@class" /> as <xsl:value-of select="$first-ancestor" /></xsl:message>
			<xsl:choose>
				<xsl:when test="not(starts-with($first-ancestor,'com\servandserv\happymeal\XML\Schema')) or $first-ancestor = 'com\servandserv\happymeal\XML\Schema\AnyComplexType'">
					<!-- Сложные типы -->
					<xsl:apply-templates select="." mode="COMPLEX" />
				</xsl:when>
				<xsl:when test="parent::tmp:schema">
					<!-- или простые элементы которые описаны в корне схемы -->
					<xsl:apply-templates select="." mode="SIMPLE" />
				</xsl:when>
			</xsl:choose>
		</xsl:for-each>
		
		<!--xsl:if test="$MODE='WITH_VALIDATORS'">
			<xsl:apply-templates select="tmp:*" mode="VALIDATOR-CLASS" />
		</xsl:if-->
}(Happymeal));
	</xsl:template>
	
	<xsl:template match="tmp:element[@name]" mode="COMPLEX">
		<xsl:variable name="class" select="@class" />
		<xsl:variable name="object" select="translate(@class,'\','.')" />
		<xsl:variable name="prototype">com\servandserv\happymeal\XML\Schema\AnyComplexType</xsl:variable>
		<xsl:variable name="props">
			<xsl:apply-templates select="." mode="TYPE" />
		</xsl:variable>
		<xsl:variable name="props-set" select="exsl:node-set($props)" />
	h.Locator( "<xsl:value-of select="$object" /><xsl:text disable-output-escaping="yes">", function(args) {
		return (function(args){
			var NS="</xsl:text><xsl:value-of select="@targetNS" /><xsl:text>";
			var ROOT="</xsl:text><xsl:value-of select="@name" /><xsl:text>";
			var URI="</xsl:text><xsl:value-of select="@targetNS" />:<xsl:value-of select="@name" /><xsl:text>";
			var anyComplexType = {</xsl:text>
			<xsl:apply-templates select="$props-set/tmp:property" mode="ECHO_PROPERTIES" />
			<xsl:text disable-output-escaping="yes">
			};
			var </xsl:text><xsl:value-of select="@name"/><xsl:text disable-output-escaping="yes"> = h.XML.Schema.AnyComplexType.extend({
		</xsl:text>
				<xsl:apply-templates select="$props-set/tmp:property" mode="ECHO_GETTERS" />
		<xsl:text>
		</xsl:text>
				<xsl:apply-templates select="$props-set/tmp:property" mode="ECHO_SETTERS" />
		<xsl:text disable-output-escaping="yes">
				getAll: function() { return anyComplexType; },
				setAll: function(obj) { anyComplexType=obj; },
				URI: URI,
				fromXmlParser: function(parser,parent,callback) {
					this.parent = parent;
					var self = this;
					</xsl:text>
					<xsl:apply-templates select="$props-set/tmp:property[@attribute]" mode="ECHO_UNSERIALIZE" />
					<xsl:text disable-output-escaping="yes">
					if(parser.tag.isSelfClosing === true &amp;&amp; parent !== null) {
						parent.fromXmlParser(parser,parent.parent,callback);
					}
					parser.onclosetag = function(tag) {
						if(tag == ROOT &amp;&amp; parent !== null) {
							parent.fromXmlParser(parser,parent.parent,callback);
						}else if(tag == ROOT &amp;&amp; parent === null) {
							callback(self);
						}
					};
					parser.onopentag = function(node) {
						switch(node.name) {</xsl:text>
							<xsl:apply-templates select="$props-set/tmp:property[@class]" mode="ECHO_UNSERIALIZE" />
							<xsl:text>
							default:
								break;
						}
					};
					parser.ontext = function(t) {
						switch(parser.tag.name) {</xsl:text>
							<xsl:apply-templates select="$props-set/tmp:property[not(@class) and not(@attribute)]" mode="ECHO_UNSERIALIZE" />
							<xsl:text disable-output-escaping="yes">
							default:
								break;
						}
					};
				},
				toXmlStr: function() {
					var prop, str;
					str = "&lt;"+ROOT;</xsl:text>
					<xsl:apply-templates select="$props-set/tmp:property[@attribute]" mode="ECHO_SERIALIZE" />
					<xsl:text disable-output-escaping="yes">
					str +=" xmlns='"+NS+"'&gt;";</xsl:text>
					<xsl:apply-templates select="$props-set/tmp:property[not(@attribute)]" mode="ECHO_SERIALIZE" />
					<xsl:text disable-output-escaping="yes">
					str += "&lt;/"+ROOT+"&gt;";
					return str;
				},
				validate: function(pubsub) {
				    var validator = h.Locator('</xsl:text>
				    <xsl:value-of select="$object" />
				    <xsl:text disable-output-escaping="yes">Validator');
				    validator.validate(this,pubsub);
				}
			});
			var pubsub = h.Locator("Happymeal.PubSub");
			return pubsub.extend(</xsl:text><xsl:value-of select="@name"/><xsl:text disable-output-escaping="yes">);
		}(args));
	});
	// Validator
	h.Locator( "</xsl:text><xsl:value-of select="$object" /><xsl:text disable-output-escaping="yes">Validator", function(args) {
	    return (function(args) {
	        var </xsl:text>
	        <xsl:value-of select="@name"/>
	        <xsl:text disable-output-escaping="yes">Validator = h.XML.Schema.AnyComplexTypeValidator.extend({
	            validate: function(m,pubsub) {
	                h.XML.Schema.AnyComplexTypeValidator.validate(m,pubsub);</xsl:text>
	                <xsl:apply-templates select="$props-set/tmp:property" mode="COMPLEX_TYPE_VALIDATOR" />
	                <xsl:text disable-output-escaping="yes">
	            }
	        });
	        var pubsub = h.Locator("Happymeal.PubSub");
	        return pubsub.extend(</xsl:text><xsl:value-of select="@name"/><xsl:text disable-output-escaping="yes">Validator);
	    }(args));
	});
    </xsl:text>
	</xsl:template>
	
	<xsl:template match="tmp:element[@name]" mode="SIMPLE">
		<xsl:variable name="class" select="@class" />
		<xsl:variable name="object" select="translate(@class,'\','.')" />
		<xsl:variable name="prototype">com\servandserv\happymeal\XML\Schema\AnySimpleType</xsl:variable>
	h.Locator( "<xsl:value-of select="$object" />", function() {
		
		<xsl:text disable-output-escaping="yes">
		return (function(){
			var value = null;
			var </xsl:text><xsl:value-of select="@name"/><xsl:text disable-output-escaping="yes"> = h.XML.Schema.AnySimpleType.extend({
				ROOT: "</xsl:text><xsl:value-of select="@name"/><xsl:text disable-output-escaping="yes">",
				NS: "</xsl:text><xsl:value-of select="@targetNS"/><xsl:text disable-output-escaping="yes">",
				URI: "</xsl:text><xsl:value-of select="@targetNS" />:<xsl:value-of select="@name" /><xsl:text>",
				get: function() { return value; },
				set: function(v) { value = v; },
				fromXmlParser: function(parser,parent,callback) {
					this.parent = parent;
					var self = this;
					parser.ontext = function(t) {
						value = t;
					};
					parser.onclosetag = function(tag) {
						callback(self);
					};
				},
				
				toXmlStr: function() {
					var prop, str;
					str = "&lt;"+this.ROOT+" xmlns='"+this.NS+"'&gt;";
					str += value;
					str += "&lt;/"+this.ROOT+"&gt;";
					return str;
				}
				
			});
			var pubsub = h.Locator("Happymeal.PubSub");
			return pubsub.extend(</xsl:text><xsl:value-of select="@name"/><xsl:text disable-output-escaping="yes">);
		}());
	});
</xsl:text>
	</xsl:template>
	
	<xsl:template match="tmp:complexType[@name]" mode="OBJECT">
		<xsl:variable name="class" select="@class" />
		<xsl:apply-templates select="//tmp:*[@typeClass = $class]" mode="OBJECT" />
	</xsl:template>
	
	<xsl:template match="tmp:*" mode="OBJECT" />
	
	<xsl:template match="tmp:*" mode="TYPE">
		<xsl:variable name="type" select="@typeClass" />
		<xsl:apply-templates select="tmp:*" mode="PROPERTIES" />
		<xsl:apply-templates select="//tmp:*[@class = $type]" mode="TYPE" />
	</xsl:template>
	
	<xsl:template match="tmp:property" mode="ECHO_PROPERTIES">
		<xsl:text>
				</xsl:text>
			<xsl:value-of select="@propName"/>: <xsl:value-of select="tmp:default" />
			<xsl:if test="position()!=last()">
			<xsl:text>,</xsl:text>
			</xsl:if>
	</xsl:template>
	
	<xsl:template match="tmp:property" mode="ECHO_GETTERS">
		<xsl:text>
				</xsl:text>
		<xsl:value-of select="@getter"/>
		<xsl:text>: function() { return anyComplexType.</xsl:text>
		<xsl:value-of select="@propName" />
		<xsl:text>; },</xsl:text>
	</xsl:template>
	
	<xsl:template match="tmp:property" mode="ECHO_SETTERS">
		<xsl:text>
				</xsl:text>
		<xsl:value-of select="@setter"/>
		<xsl:text>: function(val) { </xsl:text>
		<xsl:choose>
		    <xsl:when test="@array">
		        <xsl:text>
		            anyComplexType.</xsl:text>
                <xsl:value-of select="@propName" />
                <xsl:text>.push(val);
                    return this.isValid(</xsl:text>
                <xsl:apply-templates select="." mode="VALIDATION_RULE" />
                <xsl:text>, {
				        target: "</xsl:text><xsl:value-of select="translate(@classNS,'\','.')" /><xsl:text>",
				        prop: "</xsl:text><xsl:value-of select="translate(@name,'\','.')" /><xsl:text>",
				        val: val
				    });</xsl:text>
            </xsl:when>
			<xsl:otherwise>
			    <xsl:text>
			        anyComplexType.</xsl:text>
				<xsl:value-of select="@propName" />
				<xsl:text> = val;
				    return this.isValid((val === null || </xsl:text><xsl:apply-templates select="." mode="VALIDATION_RULE" /><xsl:text>),{
				        target: "</xsl:text><xsl:value-of select="translate(@classNS,'\','.')" /><xsl:text>",
				        prop: "</xsl:text><xsl:value-of select="translate(@name,'\','.')" /><xsl:text>",
				        val: val
				    });</xsl:text>
			</xsl:otherwise>
		</xsl:choose>
		<xsl:text>
		        },</xsl:text>
	</xsl:template>
	
	<xsl:template match="tmp:property[not(@class) and not(@attribute)]" mode="ECHO_UNSERIALIZE">
		<xsl:text>
							case "</xsl:text><xsl:value-of select="@name"/><xsl:text>":
								self.</xsl:text><xsl:value-of select="@setter" /><xsl:text>(t);
								break;</xsl:text>
	</xsl:template>
	
	<xsl:template match="tmp:property[@class]" mode="ECHO_UNSERIALIZE">
		<xsl:text>
							case "</xsl:text><xsl:value-of select="@name"/><xsl:text>":
								var </xsl:text><xsl:value-of select="@propName"/><xsl:text> = h.Locator("</xsl:text>
								<xsl:value-of select="@class" /><xsl:text>");
								</xsl:text><xsl:value-of select="@propName" /><xsl:text>.fromXmlParser(parser,self,callback);
								self.</xsl:text>
								<xsl:value-of select="@setter" />
								<xsl:text>(</xsl:text><xsl:value-of select="@propName" /><xsl:text>);
								break;</xsl:text>
	</xsl:template>
	
	<xsl:template match="tmp:property[@attribute]" mode="ECHO_UNSERIALIZE">
		<xsl:text>
			if(parser.tag.attributes.</xsl:text><xsl:value-of select="@name"/><xsl:text>) 
				self.</xsl:text><xsl:value-of select="@setter" /><xsl:text>(parser.tag.attributes.</xsl:text><xsl:value-of select="@name" /><xsl:text>);</xsl:text>
	</xsl:template>
	
	<xsl:template match="tmp:property[@attribute]" mode="ECHO_SERIALIZE">
		<xsl:text>
					prop = this.</xsl:text><xsl:value-of select="@getter" /><xsl:text disable-output-escaping="yes">();
					if(prop !== null) {
						str += " </xsl:text><xsl:value-of select="@name" /><xsl:text disable-output-escaping="yes">="+this.</xsl:text>
						<xsl:value-of select="@getter" /><xsl:text>();
					}</xsl:text>
	</xsl:template>
	
	<xsl:template match="tmp:property[not(@class) and not(@attribute) and @array]" mode="ECHO_SERIALIZE">
		<xsl:text>
					prop = this.</xsl:text><xsl:value-of select="@getter" /><xsl:text disable-output-escaping="yes">();
					var len = prop.length;
					for(var i=0;i &lt; len;i++ ) {
						str += "&lt;</xsl:text><xsl:value-of select="@name" />
						<xsl:text disable-output-escaping="yes">&gt;"+h.escapeHTML(prop[i])+"&lt;/</xsl:text>
						<xsl:value-of select="@name" /><xsl:text disable-output-escaping="yes">&gt;";
					}</xsl:text>
	</xsl:template>
	
	<xsl:template match="tmp:property[not(@class) and not(@attribute) and not(@array)]" mode="ECHO_SERIALIZE">
		<xsl:text disable-output-escaping="yes">
					prop = this.</xsl:text><xsl:value-of select="@getter" /><xsl:text disable-output-escaping="yes">();
					if( prop !== null ) {
						str += "&lt;</xsl:text><xsl:value-of select="@name" />
						<xsl:text disable-output-escaping="yes">&gt;"+h.escapeHTML(this.</xsl:text><xsl:value-of select="@getter" /><xsl:text disable-output-escaping="yes">())+"&lt;/</xsl:text>
						<xsl:value-of select="@name" /><xsl:text disable-output-escaping="yes">&gt;";
					}</xsl:text>
	</xsl:template>
	
	<xsl:template match="tmp:property[@class and not(@attribute)]" mode="ECHO_SERIALIZE">
		<xsl:text>
					prop = this.</xsl:text><xsl:value-of select="@getter" /><xsl:text disable-output-escaping="yes">();
					var len = prop.length;
					for(var i=0;i &lt; len;i++ ) {
						str += prop[i].toXmlStr();
					}</xsl:text>
	</xsl:template>
	
	<xsl:template match="tmp:property[@class and not(@attribute) and not(@array)]" mode="ECHO_SERIALIZE">
		<xsl:text>
					var prop = this.</xsl:text><xsl:value-of select="@getter" /><xsl:text disable-output-escaping="yes">();
					if(prop !== null) {
						str += this.</xsl:text><xsl:value-of select="@getter" /><xsl:text disable-output-escaping="yes">().toXmlStr();
					}</xsl:text>
	</xsl:template>
	
	<xsl:template match="tmp:property" mode="COMPLEX_TYPE_VALIDATOR">
	    <xsl:text disable-output-escaping="yes">
	                if((!h.XML.Schema.AnyComplexTypeValidator.assertMinOccurs("</xsl:text>
	    <xsl:value-of select="@minOccurs" />
	    <xsl:text disable-output-escaping="yes">",m.</xsl:text>
	    <xsl:value-of select="@getter" />
	    <xsl:text disable-output-escaping="yes">(), pubsub) ||
	                    !h.XML.Schema.AnyComplexTypeValidator.assertMaxOccurs("</xsl:text>
	    <xsl:value-of select="@maxOccurs" />
	    <xsl:text disable-output-escaping="yes">",m.</xsl:text>
	    <xsl:value-of select="@getter" />
	    <xsl:if test="@fixed">
	        <xsl:text disable-output-escaping="yes">(), pubsub) ||
	                    !h.XML.Schema.AnyComplexTypeValidator.assertFixed("</xsl:text>
	        <xsl:value-of select="@fixed" />
	        <xsl:text disable-output-escaping="yes">",m.</xsl:text>
	        <xsl:value-of select="@getter" />
	    </xsl:if>
	    <xsl:text disable-output-escaping="yes">(), pubsub))</xsl:text>
	    <xsl:if test="not(@array)">
	        <xsl:text disable-output-escaping="yes"> || 
	                    (m.</xsl:text>
	        <xsl:value-of select="@getter" />
	        <xsl:text disable-output-escaping="yes">() !== null &amp;&amp; m.</xsl:text>
	        <xsl:value-of select="@setter" />(m.<xsl:value-of select="@getter" />
	        <xsl:text disable-output-escaping="yes">()) == false )</xsl:text>
	    </xsl:if>
	    <xsl:text disable-output-escaping="yes">) {
	                    pubsub.publish("ValidationErrorOccured",{
				            target: "</xsl:text><xsl:value-of select="translate(@classNS,'\','.')" /><xsl:text>",
				            prop: "</xsl:text><xsl:value-of select="@name"/><xsl:text>",
				            val:m.</xsl:text><xsl:value-of select="@getter" /><xsl:text>()
				        });
	                }</xsl:text>
	</xsl:template>
	
	<xsl:template match="tmp:*" mode="COMPLEX_TYPE_VALIDATOR">
	    <xsl:apply-templates select="tmp:*" mode="COMPLEX_TYPE_VALIDATOR" />
	</xsl:template>

	<!-- PROPERTIES
		 свойствами класса выступают элементы и атрибуты дерева
		 от текущего элемента бежим в глубь дерева
		 и останавливаемся на ближайших атрибутах и элементах
		 
		 если встречаем именованную группу элементов или атрибутов
		 то идем в эту группу чтобы достроить
		 в свою очередь отдельно эти группы не участвуют в построении свойств
	-->
	<xsl:template match="tmp:*" mode="PROPERTIES">
		<xsl:apply-templates select="tmp:*" mode="PROPERTIES" />
	</xsl:template>
	
	<xsl:template match="tmp:*[@refClass]" mode="PROPERTIES">
		<xsl:variable name="ref" select="@refClass" />
		<!-- допускаются референтные ссылки только на узлы непоредственно расположенные в руте дерева -->
		<xsl:variable name="ref-el" select="/tmp:schema/tmp:*[@class = $ref]" />
		<xsl:choose>
			<xsl:when test="local-name() = 'element' or local-name() = 'attribute'">
				<!-- передаем ссылку на первоначальный элемент, чтобы прочитать у него часть свойств -->
				<xsl:apply-templates select="$ref-el" mode="PROPERTIES">
					<xsl:with-param name="id" select="@_ID" />
				</xsl:apply-templates>
			</xsl:when>
			<xsl:otherwise>
				<xsl:apply-templates select="$ref-el/child::*" mode="PROPERTIES" />
			</xsl:otherwise>
		</xsl:choose>
	</xsl:template>
	
	<xsl:template match="tmp:group[@class] | tmp:attributeGroup[@class]" mode="PROPERTIES" />
	
	<xsl:template match="tmp:element[@class] | tmp:attribute[@class]" mode="PROPERTIES">
		<xsl:param name="id" />
		<xsl:variable name="source-id">
			<xsl:choose>
				<xsl:when test="$id">
					<xsl:value-of select="$id" />
				</xsl:when>
				<xsl:otherwise>
					<xsl:value-of select="@_ID"/>
				</xsl:otherwise>
			</xsl:choose>
		</xsl:variable>
		<xsl:variable name="source" select="//tmp:*[@_ID = $source-id]" />
		<xsl:variable name="first-ancestor">
			<xsl:apply-templates select="." mode="FIRST_ANCESTOR" />
		</xsl:variable>
		<xsl:variable name="maxOccurs">
			<xsl:apply-templates select="$source" mode="OCCURENCE_MAX" />
		</xsl:variable>
		<xsl:variable name="minOccurs">
			<xsl:apply-templates select="$source" mode="OCCURENCE_MIN" />
		</xsl:variable>
		<!-- создаем временное дерево из свойств класса  -->
		<xsl:element name="property">
			<xsl:attribute name="name"><xsl:value-of select="@name" /></xsl:attribute>
			<xsl:attribute name="propName"><xsl:value-of select="@propName" /></xsl:attribute>
			<xsl:if test="local-name() = 'attribute'">
				<xsl:attribute name="attribute">true</xsl:attribute>
			</xsl:if>
			<xsl:attribute name="getter"><xsl:value-of select="@getter" /></xsl:attribute>
			<xsl:attribute name="setter"><xsl:value-of select="@setter" /></xsl:attribute>
			<xsl:attribute name="maxOccurs"><xsl:value-of select="$maxOccurs" /></xsl:attribute>
			<xsl:attribute name="minOccurs"><xsl:value-of select="$minOccurs" /></xsl:attribute>
			<xsl:attribute name="classNS"><xsl:value-of select="@classNS" /></xsl:attribute>
			<xsl:choose>
				<xsl:when test="starts-with($first-ancestor,'com\servandserv\happymeal\XML\Schema') and not($first-ancestor = 'com\servandserv\happymeal\XML\Schema\AnyComplexType')">
				</xsl:when>
				<xsl:otherwise>
					<xsl:attribute name="class">
						<xsl:value-of select="translate(@class,'\','.')" />
					</xsl:attribute>
				</xsl:otherwise>
			</xsl:choose>
			<xsl:attribute name="prototype">
				<xsl:value-of select="translate($first-ancestor,'\','.')" />
			</xsl:attribute>
			<xsl:if test="not($maxOccurs='1')">
				<xsl:attribute name="array">true</xsl:attribute>
			</xsl:if>
		    <xsl:if test="@fixed">
    			<xsl:attribute name="fixed"><xsl:value-of select="$source/@fixed"/></xsl:attribute>
    	    </xsl:if>
			<xsl:element name="default">
				<xsl:choose>
					<xsl:when test="$source/@default">"<xsl:value-of select="$source/@default"/>"</xsl:when>
					<xsl:when test="$source/@fixed">"<xsl:value-of select="$source/@fixed"/>"</xsl:when>
					<xsl:when test="not($maxOccurs='1')">[]</xsl:when>
					<xsl:otherwise>null</xsl:otherwise>
				</xsl:choose>
			</xsl:element>
			<xsl:element name="restriction">
			    <xsl:apply-templates select="." mode="RESTRICTIONS" />
			    <xsl:choose>
  			        <xsl:when test="starts-with($first-ancestor,'com\servandserv\happymeal\XML\Schema') and not($first-ancestor = 'com\servandserv\happymeal\XML\Schema\AnyComplexType')">
    			        <xsl:element name="simple">
	                        <xsl:attribute name="value"><xsl:value-of select="substring-after($first-ancestor,'com\servandserv\happymeal\XML\Schema\')" /></xsl:attribute>
	                    </xsl:element>
	                </xsl:when>
	                <xsl:otherwise>
	                    <xsl:element name="complex">
	                        <xsl:attribute name="value"><xsl:value-of select="translate(@class,'\',':')" /></xsl:attribute>
	                    </xsl:element>
	                </xsl:otherwise>
	            </xsl:choose>
			</xsl:element>
		</xsl:element>
	</xsl:template>
	
	<xsl:template match="tmp:*" mode="RESTRICTIONS">
	    <xsl:apply-templates select="tmp:*" mode="RESTRICTIONS" />
	</xsl:template>
	
	<xsl:template match="tmp:*[@class]" mode="RESTRICTIONS">
	    <xsl:variable name="typeClass">
	        <xsl:apply-templates select="." mode="TYPE_CLASS" />
	    </xsl:variable>
	    <xsl:apply-templates select="//tmp:*[@class = $typeClass]" mode="RESTRICTIONS" />
	    <xsl:choose>
	        <xsl:when test="tmp:simpleType/tmp:restriction">
	            <xsl:copy-of select="tmp:simpleType/tmp:restriction/tmp:*" />
	        </xsl:when>
	        <xsl:when test="tmp:restriction">
	            <xsl:copy-of select="tmp:restriction/tmp:*" />
	        </xsl:when>
	    </xsl:choose>
	</xsl:template>
	
	<xsl:template match="tmp:*" mode="TYPE_CLASS">
		<xsl:choose>
			<!-- тип указан в ссылочном элементе -->
			<xsl:when test="@refClass">
				<xsl:variable name="ref" select="@refClass" />
				<!-- допускаются референтные ссылки только на узлы непоредственно расположенные в руте дерева -->
				<xsl:apply-templates select="/tmp:schema/tmp:*[@class = $ref]" mode="TYPE_CLASS" />
			</xsl:when>
			<!-- тип указан в самом элементе -->
			<xsl:when test="@typeClass">
				<xsl:value-of select="@typeClass" />
			</xsl:when>
			<!--  тип указан в restriction элемента  -->
			<xsl:when test="tmp:restriction">
				<xsl:value-of select="tmp:restriction/@typeClass" />
			</xsl:when>
			<!--  
				тип указан в рестрикшене простого не именованного типа 
				!!  множественное наследование !!
			-->
			<xsl:when test="tmp:simpleType/tmp:restriction">
				<xsl:value-of select="tmp:*/tmp:restriction/@typeClass" />
			</xsl:when>
			<!-- наследование через listType -->
			<xsl:when test="tmp:list">
				<xsl:value-of select="tmp:list/@typeClass" />
			</xsl:when>
			<!--  наследование через неименованый комплексный тип и простой контент -->
			<xsl:when test="tmp:complexType/tmp:simpleContent/tmp:extension/@typeClass">
				<xsl:value-of select="tmp:complexType/tmp:simpleContent/tmp:extension/@typeClass" />
			</xsl:when>
			<xsl:when test="tmp:complexContent/tmp:extension/@typeClass">
				<xsl:value-of select="tmp:complexContent/tmp:extension/@typeClass" />
			</xsl:when>
			<!-- наследование через неименованый комплексный тип и сложный контент -->
			<xsl:when test="tmp:complexType/tmp:complexContent/tmp:extension/@typeClass">
				<xsl:value-of select="tmp:complexType/tmp:complexContent/tmp:extension/@typeClass" />
			</xsl:when>
			<!-- Это затычка на случай когда элемент объявлен в схеме без типа и внутри него не ничего что бы указывало
			на сложный тип делаем их по умолчанию наследниками простой строки -->
			<xsl:when test="not(descendant::tmp:element) and not(descendant::tmp:attribute) and not(descendant::tmp:complexType)">
				<xsl:text>com\servandserv\happymeal\XML\Schema\AnySimpleType</xsl:text>
			</xsl:when>
			<!--  все остальыне наследники комплексного типа -->
			<xsl:otherwise>
				<xsl:text>com\servandserv\happymeal\XML\Schema\AnyComplexType</xsl:text>
			</xsl:otherwise>
		</xsl:choose>
	</xsl:template>
	
	<xsl:template match="tmp:*" mode="FIRST_ANCESTOR">
		<xsl:variable name="classNS" select="@classNS" />
		<xsl:variable name="typeClass">
			<xsl:apply-templates select="." mode="TYPE_CLASS" />
		</xsl:variable>
		
		<xsl:choose>
			<xsl:when test="//tmp:*[@class = $typeClass]">
				<xsl:apply-templates select="//tmp:*[@class = $typeClass]" mode="FIRST_ANCESTOR" />
			</xsl:when>
			<xsl:otherwise><xsl:value-of select="$typeClass" /></xsl:otherwise>
		</xsl:choose>
	</xsl:template>
	
	<xsl:template match="tmp:*" mode="PROTOTYPE">
		<xsl:variable name="typeClass">
			<xsl:apply-templates select="." mode="TYPE_CLASS" />
		</xsl:variable>
		<xsl:choose>
			<!--  разрешим наследовать только от рутовых типов и элементов -->
			<xsl:when test="/tmp:schema/tmp:*[@class = $typeClass]">
				<xsl:apply-templates select="/tmp:schema/tmp:*[@class = $typeClass]" mode="PROTOTYPE" />
			</xsl:when>
			<xsl:otherwise><xsl:copy-of select="." /></xsl:otherwise>
		</xsl:choose>
	</xsl:template>
	
	<!--  правила повторения узлов в дереве
		размещаются не всегда в узле элемента, но могут быть размещены в родительской элементе
		типа choice
		а может быть описано в группе на которую идет ссылка
		анчале проверяем этот вариант
	-->
	<xsl:template match="tmp:*" mode="OCCURENCE_MAX">
		<xsl:variable name="group" select="parent::tmp:choice/parent::tmp:group" />
		<xsl:choose>
			<!-- допускаются референтные ссылки только на узлы непоредственно расположенные в руте дерева -->
			<xsl:when test="$group and /tmp:schema/tmp:group[@ref = $group/@name]/@maxOccurs"><xsl:value-of select="/tmp:schema/tmp:group[@ref = $group/@name]/@maxOccurs" /></xsl:when>
			<xsl:when test="@maxOccurs"><xsl:value-of select="@maxOccurs" /></xsl:when>
			<xsl:when test="parent::*/@maxOccurs"><xsl:value-of select="parent::*/@maxOccurs" /></xsl:when>
			<xsl:otherwise>1</xsl:otherwise>
		</xsl:choose>
	</xsl:template>
	
	<xsl:template match="tmp:*" mode="OCCURENCE_MIN">
		<xsl:variable name="group" select="parent::tmp:choice/parent::tmp:group" />
		<xsl:choose>
			<!-- допускаются референтные ссылки только на узлы непоредственно расположенные в руте дерева -->
			<xsl:when test="$group and /tmp:schema/tmp:group[@ref = $group/@name]/@minOccurs"><xsl:value-of select="/tmp:schema/tmp:group[@ref = $group/@name]/@minOccurs" /></xsl:when>
			<xsl:when test="@minOccurs"><xsl:value-of select="@minOccurs" /></xsl:when>
			<xsl:when test="parent::*/@minOccurs"><xsl:value-of select="parent::*/@minOccurs" /></xsl:when>
			<xsl:otherwise>1</xsl:otherwise>
		</xsl:choose>
	</xsl:template>
	
	<xsl:template match="tmp:*" mode="VALIDATION_RULE">
	    <xsl:apply-templates select="tmp:*" mode="VALIDATION_RULE" />
	</xsl:template>
	
	<xsl:template match="tmp:restriction" mode="VALIDATION_RULE">
	    <xsl:variable name="name" select="parent::tmp:property/@name" />
	    <xsl:if test="tmp:enumeration">
	        <xsl:variable name="enum">
			<xsl:for-each select="tmp:enumeration">
				<xsl:text>"</xsl:text>
				<xsl:value-of select="@value" />
				<xsl:text>"</xsl:text>
				<xsl:if test="not(position() = last())">
					<xsl:text>, </xsl:text>
				</xsl:if>
			</xsl:for-each>
		    </xsl:variable>
			<xsl:text>h.XML.Schema.AnySimpleTypeValidator.assertEnumeration([</xsl:text><xsl:value-of select="$enum" /><xsl:text>],val,this)</xsl:text>
			<xsl:if test="tmp:*[not(local-name()='enumeration')]"><xsl:text disable-output-escaping="yes"> &amp;&amp;
	                    </xsl:text>
	                </xsl:if>
	    </xsl:if>
	    <xsl:for-each select="tmp:*[not(local-name()='enumeration')]">
	        <xsl:apply-templates select="." mode="VALIDATION_RULE" />
	        <xsl:if test="not(position()=last())"><xsl:text disable-output-escaping="yes"> &amp;&amp;
	                    </xsl:text></xsl:if>
	    </xsl:for-each>
	</xsl:template>
	
	<xsl:template match="tmp:minExclusive | tmp:maxExclusive | tmp:minInclusive | tmp:maxInclusive | tmp:length | tmp:minLength | tmp:maxLength | tmp:pattern | tmp:simple" mode="VALIDATION_RULE">
	    <xsl:variable name="name" select="ancestor::tmp:property[1]/@name" />
		<xsl:text disable-output-escaping="yes">h.XML.Schema.AnySimpleTypeValidator.assert</xsl:text>
			<xsl:value-of select="translate(substring(local-name(),1,1),$smallcase,$uppercase)"/>
			<xsl:value-of select="substring(local-name(),2)"/>
			<xsl:text disable-output-escaping="yes">("</xsl:text>
			<xsl:value-of select="@value" />
			<xsl:text>",val,this)</xsl:text>
	</xsl:template>
	
	<xsl:template match="tmp:complex" mode="VALIDATION_RULE">
	    <xsl:text disable-output-escaping="yes">h.XML.Schema.AnyComplexTypeValidator.assertType("</xsl:text>
	    <xsl:value-of select="@value" />
	    <xsl:text>",val,this)</xsl:text>
	</xsl:template>
	
	<xsl:template name="REPLACE">
		<xsl:param name="input"/>
		<xsl:param name="from"/>
		<xsl:param name="to"/>

		<xsl:choose>
			<xsl:when test="contains($input, $from)">
				<!--   вывод подстроки предшествующей образцу  + вывод строки замены -->
				<xsl:value-of select="substring-before($input, $from)"/>
				<xsl:value-of select="$to"/>
				<!--   вход в итерацию -->
				<xsl:call-template name="replace">
					<!--  в качестве входного параметра задается подстрока после образца замены  -->
					<xsl:with-param name="input" select="substring-after($input, $from)"/>
					<xsl:with-param name="from" select="$from"/>
					<xsl:with-param name="to" select="$to"/>
				</xsl:call-template>
			</xsl:when>
			<xsl:otherwise>
				<xsl:value-of select="$input"/>
			</xsl:otherwise>
		</xsl:choose>
	</xsl:template>

</xsl:stylesheet>