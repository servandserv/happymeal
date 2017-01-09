<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet
	xmlns="http://www.w3.org/1999/xhtml"
	xmlns:xsd="http://www.w3.org/2001/XMLSchema"
	xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
	xmlns:html="http://www.w3.org/1999/xhtml"
	xmlns:exsl="http://exslt.org/common"
	xmlns:wadlext="urn:wadlext"
	xmlns:v="urn:com:servandserv:happymeal:views"
    xmlns:ex="urn:com:servandserv:example"
    xmlns:err="urn:com:servandserv:happymeal:errors"
    xmlns:link="urn:com:servandserv:xml"
	extension-element-prefixes="exsl"
	exclude-result-prefixes="xsd xsl html wadlext v ex err link"
	version="1.0">

<xsl:output
	media-type="application/xhtml+xml"
	method="xml"
	encoding="UTF-8"
	indent="yes"
	omit-xml-declaration="no"
	doctype-public="-//W3C//DTD XHTML 1.1//EN"
	doctype-system="http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd" />

<xsl:include href="common.xsl" />

<!-- add resource -->
<xsl:variable name="MODEL" select="document('example1.php')/ex:Model" />

<xsl:template match="/">
    <html lang="en" xml:lang="en">
        <head>
            <xsl:call-template name="common-header" />
        </head>
        <body>
            <h1>Link</h1>
            <form name="save" action="view.command.php?__referrer__={$VIEW/v:Token/v:id}" method="POST">
                <!--label for="referrer">Token Id</label>
                <input type="text" id="referrer" name="__referrer__" value="{$VIEW/v:Token/v:id}" /-->
                <div>
                    <label for="href">Href</label>
                    <xsl:call-template name="common-input">
                        <xsl:with-param name="type" select="'text'" />
                        <xsl:with-param name="id" select="'href'" />
                        <xsl:with-param name="name" select="'href'" />
                        <xsl:with-param name="error" select="$VIEW/v:Callback/err:Errors/err:Error[err:name='href']" />
                        <xsl:with-param name="default" select="''" />
                    </xsl:call-template>
                </div>
                <div>
                    <label for="rel">Rel</label>
                    <xsl:call-template name="common-input">
                        <xsl:with-param name="type" select="'text'" />
                        <xsl:with-param name="id" select="'rel'" />
                        <xsl:with-param name="name" select="'rel'" />
                        <xsl:with-param name="error" select="$VIEW/v:Callback/err:Errors/err:Error[err:name='rel']" />
                        <xsl:with-param name="default" select="''" />
                    </xsl:call-template>
                </div>
                <div>
                    <input type="submit" name="submit" value="SUBMIT" />
                </div>
            </form>
            <code>
                <p>Referrer: <xsl:value-of select="$VIEW/v:Referrer/v:id" /></p>
                <p>Callback: <xsl:value-of select="$VIEW/v:Callback/v:id" /></p>
                <p>Token: <xsl:value-of select="$VIEW/v:Token/v:id" /></p>
            </code>
        </body>
    </html>
</xsl:template>

</xsl:stylesheet>