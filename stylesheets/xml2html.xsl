<?xml version="1.0"?>
<!--
  Copyright 1999-2004 The Apache Software Foundation

  Licensed under the Apache License, Version 2.0 (the "License");
  you may not use this file except in compliance with the License.
  You may obtain a copy of the License at

      http://www.apache.org/licenses/LICENSE-2.0

  Unless required by applicable law or agreed to in writing, software
  distributed under the License is distributed on an "AS IS" BASIS,
  WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
  See the License for the specific language governing permissions and
  limitations under the License.
-->

<!--+
    | XSLT REC Compliant Version of IE5 Default Stylesheet
    |
    | Original version by Jonathan Marsh (jmarsh@microsoft.com)
    | Conversion to XSLT 1.0 REC Syntax by Steve Muench (smuench@oracle.com)
    | Added script support by Andrew Timberlake (andrew@timberlake.co.za)
    | Cleaned up and ported to standard DOM by Stefano Mazzocchi (stefano@apache.org)
    |
    | CVS $Id$
    +-->
    
<xsl:stylesheet
	xmlns="http://www.w3.org/1999/xhtml"
	xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
	exclude-result-prefixes="xsl"
	version="1.0">

<xsl:output
	media-type="application/xhtml+xml"
	method="xml"
	encoding="UTF-8"
	indent="no"
	omit-xml-declaration="no"
	doctype-public="-//W3C//DTD XHTML 1.1//EN"
	doctype-system="http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd" />

   <xsl:template match="/">
      <html>
         <xsl:call-template name="head"/>
         <body>
            <xsl:apply-templates/>
         </body>
      </html>
   </xsl:template>

   <xsl:template name="head">
         <head>
            <style type="text/css">
              body  {background-color: white; color: black; font-family: monospace;}
                .b  {cursor:pointer; color:red; font-weight:bold; text-decoration:none; padding-right: 2px;}
                .e  {border: 0px; padding: 0px; margin: 0px 0px 0px 2em; text-indent:-1em;}
                .en {color:#000088; font-weight:bold;}
                .an {color:#880000}
                .av {color:#888888}
                .c  {color:#008800}
                .t  {color:black}
                .m  {color:navy}
                .pi {color:red}
                pre {margin:0px; display:inline}
                div {border:0; padding:0; margin:0;}
            </style>
            <script type="text/javascript">
            <xsl:text disable-output-escaping="yes">
function cl(event) {

    var mark = event.target;
    while ((mark.className != "b") &amp;&amp; (mark.nodeName != "body")) {
        mark = mark.parentNode
    }

    var e = mark;
    while ((e.className != "e") &amp;&amp; (e.nodeName != "body")) {
        e = e.parentNode
    }

    console.log(mark);

    if (mark.childNodes[0].nodeValue == "+") {
        mark.childNodes[0].nodeValue = "-";
        for (var i = 2; i &lt; e.childNodes.length; i++) {
            var name = e.childNodes[i].nodeName;
            if (name != "#text") {
                if (name == "pre" || name == "span") {
                   window.status = "inline";
                   e.childNodes[i].style.display = "inline";
                } else {
                   e.childNodes[i].style.display = "block";
                }
            }
        }
    } else if (mark.childNodes[0].nodeValue == "-") {
        mark.childNodes[0].nodeValue = "+";
        for (var i = 2; i &lt; e.childNodes.length; i++) {
            if (e.childNodes[i].nodeName != "#text") {
                e.childNodes[i].style.display = "none";
            }
        }
    }
}  
</xsl:text>
            </script>
         </head>
   </xsl:template>

   <!-- match processing instructions -->
   <xsl:template match="processing-instruction()">
      <div class="e">
         <span class="m">&lt;?</span><span class="pi">
            <xsl:value-of select="name(.)"/>
            <xsl:text> </xsl:text>
            <xsl:value-of select="."/>
         </span><span class="m">?></span>
      </div>
   </xsl:template>

   <!-- match text -->
   <xsl:template match="text()">
      <div class="e">
         <span class="t">
            <xsl:value-of select="."/>
         </span>
      </div>
   </xsl:template>

   <!-- match comments -->
   <xsl:template match="comment()">
      <div class="e">
         <span class="b" onclick="cl(event)">-</span>
         <span class="m">&lt;!--</span>
         <span class="c">
            <pre>
               <xsl:value-of select="."/>
            </pre>
         </span>
         <span class="m">--&gt;</span>
      </div>
   </xsl:template>

   <!-- match attributes -->
   <xsl:template match="@*">
      <span class="an">
         <xsl:value-of select="name(.)"/>
      </span><span class="m">="</span><span class="av">
         <xsl:value-of select="."/>
      </span><span class="m">"</span>
      <xsl:if test="position()!=last()">
         <xsl:text>&#160;</xsl:text>
      </xsl:if>
   </xsl:template>
   
   <!-- match empty elements -->
   <xsl:template match="*[not(node())]">
      <div class="e">
        <span class="m">&lt;</span><span class="en">
           <xsl:value-of select="name(.)"/>
        </span>
        <xsl:if test="@*">
           <xsl:text> </xsl:text>
        </xsl:if>
        <xsl:apply-templates select="@*"/>
        <xsl:apply-templates select="." mode="namespace"/>
        <span class="m">/&gt;</span>
      </div>
   </xsl:template>

   <!-- match elements with only text(), they are not closeable -->
   <xsl:template match="*[text()][not(* or comment() or processing-instruction())]" priority="10">
      <div class="e">
        <span class="m">&lt;</span><span class="en">
           <xsl:value-of select="name(.)"/>
        </span>
        <xsl:if test="@*">
           <xsl:text> </xsl:text>
        </xsl:if>
        <xsl:apply-templates select="@*"/>
        <xsl:apply-templates select="." mode="namespace"/>
        <span class="m">
           <xsl:text>></xsl:text>
        </span>
        <span class="t">
           <xsl:value-of select="."/>
        </span>
        <span class="m">&lt;/</span>
        <span class="en">
           <xsl:value-of select="name(.)"/>
        </span>
        <span class="m">
           <xsl:text>></xsl:text>
        </span>
      </div>
   </xsl:template>

   <xsl:template match="*[node()]">
      <div class="e">
         <div>
            <span class="b" onclick="cl(event);">-</span>
            <span class="m">&lt;</span>
            <span class="en">
               <xsl:value-of select="name(.)"/>
            </span>
            <xsl:if test="@*">
               <xsl:text> </xsl:text>
            </xsl:if>
            <xsl:apply-templates select="@*"/>
            <xsl:apply-templates select="." mode="namespace"/>
            <span class="m">
               <xsl:text>></xsl:text>
            </span>
         </div>
         <div>
            <xsl:apply-templates/>
            <div>
               <span class="m">&lt;/</span><span class="en">
                  <xsl:value-of select="name(.)"/>
               </span><span class="m">
                  <xsl:text>&gt;</xsl:text>
               </span>
            </div>
         </div>
      </div>
   </xsl:template>

   <xsl:template match="*" mode="namespace">
     <xsl:variable name="context" select="."/>
     <xsl:for-each select="namespace::node()">
       <xsl:variable name="nsuri" select="."/>
       <xsl:variable name="nsprefix" select="name()"/>
       <xsl:choose>
        <xsl:when test="$nsprefix = 'xml'">
          <!-- xml namespace -->
        </xsl:when>
        <xsl:when test="$context/../namespace::node()[name() = $nsprefix and . = $nsuri]">
          <!-- namespace already declared on the parent -->
        </xsl:when>
        <xsl:otherwise>
          <xsl:text> </xsl:text>
          <span class="an">
            <xsl:text>xmlns</xsl:text>
            <xsl:if test="$nsprefix">
              <xsl:text>:</xsl:text>
              <xsl:value-of select="$nsprefix"/>
            </xsl:if>
          </span>
          <span class="m">="</span>
          <span class="av">
            <xsl:value-of select="."/>
          </span>
          <span class="m">"</span>
        </xsl:otherwise>
       </xsl:choose>
     </xsl:for-each>
   </xsl:template>

</xsl:stylesheet>
