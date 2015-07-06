<?xml version="1.0" encoding="UTF-8"?>

<!--
    Document   : wadl2sitemap.xsl
    Created on : 04 July 2015, 21:31
    Author     : kolpakov
    Description:
        Формируем файл sitemap.xml
-->

<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
                xmlns:tmp="urn:ru:ilb:tmp"
                xmlns:xsd="http://www.w3.org/2001/XMLSchema"
                xmlns:html="http://www.w3.org/1999/xhtml"
                xmlns:map="http://www.sitemaps.org/schemas/sitemap/0.9"
                xmlns:wadl="http://wadl.dev.java.net/2009/02"
                xmlns:wadlext="urn:wadlext"
                xmlns:exsl="http://exslt.org/common"
                xmlns:regexp="http://exslt.org/regular-expressions"
                extension-element-prefixes="exsl regexp"
                exclude-result-prefixes="tmp"
                xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
                targetNamespace="http://www.sitemaps.org/schemas/sitemap/0.9"
                version="1.0">

    <xsl:output
        media-type="text/xml"
        method="xml"
        encoding="UTF-8"
        indent="yes"
        omit-xml-declaration="no"  />
    <xsl:strip-space elements="*"/>
    
    <xsl:param name="WADL" />
    <xsl:param name="API" />
    <xsl:param name="OUTDIR" />

    <xsl:variable name="RESOURCES" select="wadl:application/wadl:resources" />

    <xsl:template match="wadl:application">
        <xsl:element name="urlset" namespace="http://www.sitemaps.org/schemas/sitemap/0.9">
            <xsl:apply-templates select="wadl:resources/wadl:resource">
                <xsl:with-param name="path" select="$RESOURCES/@base" />
            </xsl:apply-templates>
        </xsl:element>
    </xsl:template>

    <xsl:template match="wadl:resource">
        <xsl:param name="path" />
        <xsl:if test="not(contains(@path,':')) and wadl:method[@name='GET']">
            <url>
                <loc>
                    <xsl:value-of select="$path" />
                    <xsl:value-of select="@path" />
                </loc>
            </url>
            <xsl:apply-templates select="wadl:resource">
                <xsl:with-param name="path" select="concat($path,@path)" />
            </xsl:apply-templates>
        </xsl:if>
    </xsl:template>
    
</xsl:stylesheet>
