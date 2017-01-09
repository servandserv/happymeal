<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet
	xmlns="http://www.w3.org/1999/xhtml"
	xmlns:xsd="http://www.w3.org/2001/XMLSchema"
	xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
	xmlns:html="http://www.w3.org/1999/xhtml"
	xmlns:exsl="http://exslt.org/common"
	xmlns:wadlext="urn:wadlext"
	xmlns:v="urn:com:servandserv:happymeal:views"
    xmlns:err="urn:com:servandserv:happymeal:errors"
	extension-element-prefixes="exsl"
	exclude-result-prefixes="xsd xsl html wadlext v err"
	version="1.0">

<xsl:output
	media-type="application/xhtml+xml"
	method="xml"
	encoding="UTF-8"
	indent="yes"
	omit-xml-declaration="no"
	doctype-public="-//W3C//DTD XHTML 1.1//EN"
	doctype-system="http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd" />

<xsl:include href="globals.xsl" />

<xsl:template name="common-header">
	<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title><xsl:value-of select="$APP_NAME" /></title>
    <link rel="stylesheet" type="text/css" href="css/normalize.css" />
    <link rel="stylesheet" type="text/css" href="css/typography.css" />
    <link rel="stylesheet" type="text/css" href="css/example.css" />
</xsl:template>

<xsl:template name="common-input">
    <xsl:param name="type" select="'text'" />
    <xsl:param name="id" />
    <xsl:param name="name" />
    <xsl:param name="default" select="''" />
    <xsl:param name="error" />
     <xsl:element name="input">
        <xsl:attribute name="type"><xsl:value-of select="$type" /></xsl:attribute>
        <xsl:attribute name="id"><xsl:value-of select="$id" /></xsl:attribute>
        <xsl:attribute name="name"><xsl:value-of select="$name" /></xsl:attribute>
        <xsl:attribute name="value">
            <xsl:choose>
                <xsl:when test="$error">
                    <xsl:value-of select="$error/err:value" />
                </xsl:when>
                <xsl:otherwise>
                    <xsl:value-of select="$default" />
                </xsl:otherwise>
            </xsl:choose>
        </xsl:attribute>
    </xsl:element>
    <xsl:if test="$error">
        <div>
            Error: <xsl:value-of select="$error/err:description" />
        </div>
    </xsl:if>
</xsl:template>

</xsl:stylesheet>
