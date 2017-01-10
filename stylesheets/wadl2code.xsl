<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
                xmlns:tmp="urn:com:servandserv:happymeal:tmp"
                xmlns:xsd="http://www.w3.org/2001/XMLSchema"
                xmlns:html="http://www.w3.org/1999/xhtml"
                xmlns:wadl="http://wadl.dev.java.net/2009/02"
                xmlns:wadlext="urn:wadlext"
                xmlns:exsl="http://exslt.org/common"
                xmlns:regexp="http://exslt.org/regular-expressions"
                extension-element-prefixes="exsl regexp"
                exclude-result-prefixes="tmp"
                xmlns="urn:com:servandserv:happymeal:tmp"
                version="1.0">

    <xsl:output
        media-type="text/xml"
        method="xml"
        encoding="UTF-8"
        indent="no"
        omit-xml-declaration="yes"  />
    <xsl:strip-space elements="*"/>
    
    <xsl:param name="WADL" />
    <xsl:param name="API" />
    <xsl:param name="DEST" />
    
    <!--xsl:variable name="SCHEMAS" select="document('../../happymeal_build_tmp/consolidated.xml')/tmp:schema"/-->
    
    <xsl:variable name="smallcase" select="'abcdefghijklmnopqrstuvwxyz'" />
    <xsl:variable name="uppercase" select="'ABCDEFGHIJKLMNOPQRSTUVWXYZ'" />
    
    <!-- prepare resources nodes -->
    <xsl:variable name="RESOURCES-SET">
        <xsl:apply-templates select="wadl:application/wadl:resources" mode="RESOURCES" />
    </xsl:variable>
    <xsl:variable name="RESOURCES" select="exsl:node-set($RESOURCES-SET)" />
    
    <xsl:template match="wadl:*" mode="RESOURCES">
        <xsl:element name="{local-name()}">
            <xsl:copy-of select="@*" />
            <xsl:apply-templates select="wadl:*" mode="RESOURCES" />
        </xsl:element>
    </xsl:template>
    
    <xsl:template match="wadl:resource" mode="RESOURCES">
        <xsl:element name="resource">
            <xsl:copy-of select="@*" />
            <xsl:choose>
                <xsl:when test="@type">
                    <xsl:variable name="id" select="$type" />
                    <xsl:copy-of select="/wadl:application/wadl:resource_type[@id=$id]/@*" />
                    <xsl:apply-templates select="/wadl:application/wadl:resource_type[@id=$id]/wadl:*" mode="RESOURCES" />
                    <xsl:apply-templates select="wadl:*" mode="RESOURCES" />
                </xsl:when>
                <xsl:otherwise>
                    <xsl:apply-templates select="wadl:*" mode="RESOURCES" />
                </xsl:otherwise>
            </xsl:choose>
        </xsl:element>
    </xsl:template>
    
    <xsl:template match="wadl:resource_type" mode="RESOURCES">
        <xsl:apply-templates select="wadl:*" mode="RESOURCES" />
    </xsl:template>
    
    <xsl:template match="wadl:method" mode="RESOURCES">
        <xsl:element name="method">
            <xsl:copy-of select="@*" />
            <xsl:choose>
                <xsl:when test="@href">
                    <xsl:variable name="id" select="@href" />
                    <xsl:copy-of select="/wadl:application/wadl:method[@id=$id]/@*" />
                    <xsl:apply-templates select="/wadl:application/wadl:method[@id=$id]/wadl:*" mode="RESOURCES" />
                    <!-- A method reference element MUST NOT have any other WADL-defined attributes or contain any WADL-defined child elements.-->
                </xsl:when>
                <xsl:otherwise>
                    <xsl:apply-templates select="wadl:*" mode="RESOURCES" />
                </xsl:otherwise>
            </xsl:choose>
        </xsl:element>
    </xsl:template>
    
    <xsl:template match="wadl:representation" mode="RESOURCES">
        <xsl:element name="representation">
            <xsl:copy-of select="@*" />
            <xsl:choose>
                <xsl:when test="@href">
                    <xsl:variable name="id" select="@href" />
                    <xsl:copy-of select="/wadl:application/wadl:representation[@id=$id]/@*" />
                    <xsl:apply-templates select="/wadl:application/wadl:representation[@id=$id]/wadl:*" mode="RESOURCES" />
                    <!-- A representation reference element MUST NOT have any other WADL-defined attributes or contain any WADL-defined child elements.-->
                </xsl:when>
                <xsl:otherwise>
                    <xsl:apply-templates select="wadl:*" mode="RESOURCES" />
                </xsl:otherwise>
            </xsl:choose>
        </xsl:element>
    </xsl:template>
    
    <xsl:template match="wadl:param" mode="RESOURCES">
        <xsl:element name="param">
            <xsl:copy-of select="@*" />
            <xsl:choose>
                <xsl:when test="@href">
                    <xsl:variable name="id" select="@href" />
                    <xsl:copy-of select="/wadl:application/wadl:param[@id=$id]/@*" />
                    <xsl:apply-templates select="/wadl:application/wadl:param[@id=$id]/wadl:*" mode="RESOURCES" />
                    <!-- A param reference element MUST NOT have any other WADL-defined attributes or contain any WADL-defined child elements.-->
                </xsl:when>
                <xsl:otherwise>
                    <xsl:apply-templates select="wadl:*" mode="RESOURCES" />
                </xsl:otherwise>
            </xsl:choose>
        </xsl:element>
    </xsl:template>
    
    <xsl:template match="wadl:application">
        <xsl:for-each select="$RESOURCES//tmp:resource">
            <xsl:text disable-output-escaping="yes">
#path: </xsl:text><xsl:value-of select="$DEST" /><xsl:value-of select="ancestor::tmp:resources/@base" /><xsl:value-of select="@path" />
            <xsl:text disable-output-escaping="yes">
&lt;?php
    
require_once __DIR__."/../conf/bootstrap.php";
require_once __DIR__."/../conf/conf.php";

/**
 * в файле conf.php надо создать переменную $app и присвоить ей значение фабрики WADL объектов
 */
$app-&gt;createResource(</xsl:text>
            <xsl:value-of select="concat('&#34;',ancestor::tmp:resources/@base,@path,'&#34;')" />
            <xsl:if test="@mediaType">
                <xsl:value-of select="concat(',&#34;',@mediaType,'&#34;')" />
            </xsl:if>
            <xsl:text disable-output-escaping="yes">)</xsl:text>
            <xsl:apply-templates select="tmp:param" mode="APP" />
            <xsl:apply-templates select="tmp:method" mode="APP" />
            <xsl:apply-templates select="tmp:resource" mode="APP" />
        </xsl:for-each>
    <xsl:text disable-output-escaping="yes">
    -&gt;run();
    </xsl:text>
    </xsl:template>
    
    <xsl:template match="tmp:method" mode="APP">
        <xsl:text  disable-output-escaping="yes">
    -&gt;setMethod($app-&gt;createMethod(</xsl:text>
        <xsl:value-of select="concat('&#34;',@name,'&#34;')" />
        <xsl:value-of select="concat(',&#34;',@id,'&#34;')" />
        <xsl:text>)</xsl:text>
        <xsl:apply-templates select="tmp:request" mode="APP" />
        <xsl:apply-templates select="tmp:response" mode="APP" />
        <xsl:text>)</xsl:text>
    </xsl:template>
    
    <xsl:template match="tmp:request" mode="APP">
        <xsl:text  disable-output-escaping="yes">
        -&gt;setRequest($app->createRequest()</xsl:text>
        <xsl:apply-templates select="tmp:param" mode="APP" />
        <xsl:apply-templates select="tmp:representation" mode="APP" />
        <xsl:text>)</xsl:text>
    </xsl:template>
    
    <xsl:template match="tmp:response" mode="APP">
        <xsl:text  disable-output-escaping="yes">
        -&gt;setResponse($app->createResponse(</xsl:text>
        <xsl:value-of select="concat('&#34;',@status,'&#34;')" />
        <xsl:text>)</xsl:text>
        <xsl:apply-templates select="tmp:param[@style='header']" mode="APP" />
        <xsl:apply-templates select="tmp:representation" mode="APP" />
        <xsl:text>)</xsl:text>
    </xsl:template>
    
    <xsl:template match="tmp:param" mode="APP">
            <xsl:text  disable-output-escaping="yes">
            -&gt;setParam($app->createParam(</xsl:text>
            <xsl:value-of select="concat('&#34;',@name,'&#34;')" />
            <xsl:value-of select="concat(',&#34;',@style,'&#34;')" />
            <xsl:choose>
                <xsl:when test="@type">
                    <xsl:value-of select="concat(',&#34;',@type,'&#34;')" />
                </xsl:when>
                <xsl:otherwise>,NULL</xsl:otherwise>
            </xsl:choose>
            <xsl:choose>
                <xsl:when test="@default">
                    <xsl:value-of select="concat(',&#34;',@default,'&#34;')" />
                </xsl:when>
                <xsl:otherwise>,NULL</xsl:otherwise>
            </xsl:choose>
            <!-- path ? -->
            <xsl:text>,NULL</xsl:text>
            <xsl:choose>
                <xsl:when test="@required">
                    <xsl:value-of select="concat(',&#34;',@required,'&#34;')" />
                </xsl:when>
                <xsl:otherwise>,NULL</xsl:otherwise>
            </xsl:choose>
            <xsl:choose>
                <xsl:when test="@repeating">
                    <xsl:value-of select="concat(',&#34;',@repeating,'&#34;')" />
                </xsl:when>
                <xsl:otherwise>,FALSE</xsl:otherwise>
            </xsl:choose>
            <xsl:choose>
                <xsl:when test="@fixed">
                    <xsl:value-of select="concat(',&#34;',@fixed,'&#34;')" />
                </xsl:when>
                <xsl:otherwise>,NULL</xsl:otherwise>
            </xsl:choose>
            <xsl:text>))</xsl:text>
    </xsl:template>
    
    <xsl:template match="tmp:representation" mode="APP">
        <xsl:text  disable-output-escaping="yes">
            -&gt;setRepresentation($app-&gt;createRepresentation(</xsl:text>
            <xsl:value-of select="concat('&#34;',@mediaType,'&#34;')" />
            <xsl:choose>
                <xsl:when test="@element">
                    <xsl:value-of select="concat(',&#34;',@element,'&#34;')" />
                </xsl:when>
                <xsl:otherwise>,NULL</xsl:otherwise>
            </xsl:choose>
            <xsl:choose>
                <xsl:when test="@profile">
                    <xsl:value-of select="concat(',&#34;',@profile,'&#34;')" />
                </xsl:when>
                <xsl:otherwise>,NULL</xsl:otherwise>
            </xsl:choose>
        <xsl:text>)</xsl:text>
        <xsl:apply-templates select="tmp:param" mode="APP" />
        <xsl:text>)</xsl:text>
    </xsl:template>
    
    
    <xsl:template match="wadl:applicatio" mode="API">
        <xsl:value-of select="@*" />
        <xsl:text disable-output-escaping="yes">

#path: </xsl:text><xsl:value-of select="$OUTDIR" /><xsl:text disable-output-escaping="yes">/web/</xsl:text>
        <xsl:value-of select="$API" />
        <xsl:text disable-output-escaping="yes">
&lt;?php

require_once __DIR__.'/../conf/bootstrap.php';
require_once __DIR__.'/../conf/conf.php';

$app = \App::getInstance();
$app->REF = function( $url ) use ($app) {</xsl:text>
        <xsl:apply-templates select="wadl:resources//wadl:resource" mode="REF" />
        <xsl:text disable-output-escaping="yes">
    throw new \Exception($url["path"]." not found",404);
};
$app->CONTROLLER = function() use ($app) {
    $app->get('/',function() use ($app) {
        $file = dirname(__FILE__)."</xsl:text><xsl:value-of select="$WADL" /><xsl:text disable-output-escaping="yes">";
        $app->cacheControl(filemtime($file));
        header("Content-Type: application/xml; charset=utf-8");
        echo(file_get_contents($file));
        exit();
    });
        </xsl:text>
        <xsl:apply-templates select="wadl:resources//wadl:resource" mode="LOCATOR" />
        <xsl:text disable-output-escaping="yes">
    $app->throwError(new \Exception("Not found",404));
};
$app->locate("CONTROLLER");
    </xsl:text>
    </xsl:template>
    
    <xsl:template match="wadl:resource" mode="REF">
        <xsl:variable name="path">
            <xsl:apply-templates select="." mode="PATH" />
        </xsl:variable>
        <!--xsl:variable name="resource" select="ancestor-or-self::wadl:resource[position() = last()]/@id" /-->
        <xsl:for-each select="wadl:method[translate(@name,$uppercase,$smallcase) = 'get']">
        <xsl:text disable-output-escaping="yes">
    $args = $app->matchAll( "</xsl:text>
        <xsl:value-of select="$path" />
        <xsl:text disable-output-escaping="yes">", $url );
    if( $args !== NULL ) {
        $usecase = $app->USECASES."\\</xsl:text><xsl:value-of select="@id" /><xsl:text disable-output-escaping="yes">";
        $usecase = new $usecase();
        $result = call_user_func_array(array(&amp;$usecase,"execute"),$args);
        return $app->handleOutput( $result );
    }</xsl:text>
        </xsl:for-each>
    </xsl:template>
    
    <xsl:template match="wadl:resource" mode="LOCATOR">
        <xsl:variable name="path">
            <xsl:apply-templates select="." mode="PATH" />
        </xsl:variable>
        <!--xsl:variable name="resource" select="ancestor-or-self::wadl:resource[position() = last()]/@id" /-->
        <xsl:for-each select="wadl:method">
        <xsl:variable name="method-name" select="translate(@name,$uppercase,$smallcase)" />
        <!-- если указан в описании responce со статусом 304 то на гет запросах будем мутить кеширование -->
        <xsl:variable name="responseEl" select="wadl:response[@status='200']/wadl:representation/@element" />
        <xsl:variable name="responseClass" select="$SCHEMAS//tmp:*[concat(@targetNS,':',@name) = $responseEl]/@class" />
        <xsl:text disable-output-escaping="yes">
    $app-></xsl:text>
            <xsl:value-of select="$method-name" />
            <xsl:text>("</xsl:text>
            <xsl:value-of select="$path" />
            <xsl:text disable-output-escaping="yes">",</xsl:text>
            <!-- В зависимости от описанных заголовков формируем шаблоны соответствующих функций, которые эти заголовки формируют  -->
            <xsl:if test="wadl:response[@status='304'] and $responseClass">
            <!-- кешируемый ответ -->
            <xsl:text disable-output-escaping="yes">
        function() use ($app) {
            $em = $app->EM->create("\\"."</xsl:text><xsl:value-of select="$responseClass"/><xsl:text disable-output-escaping="yes">");
            $app->cacheControl( $em->lastmod( func_get_args() ) );
        },</xsl:text>
            </xsl:if>
            <xsl:text disable-output-escaping="yes">
        function() use ($app) {
            try {</xsl:text>
            <!-- если указан элемент в representation  request'a то подставляем адаптор класса для того, чтобы записать в него данные запроса -->
            <xsl:variable name="requestEl" select="wadl:request/wadl:representation/@element" />
            <xsl:variable name="requestClass" select="$SCHEMAS//tmp:*[concat(@targetNS,':',@name) = $requestEl]/@class" />
            
            <xsl:for-each select="wadl:request/wadl:param[@style='query' and @default]">
                <xsl:text disable-output-escaping="yes">
                if(!isset( $app->QUERY["</xsl:text>
                <xsl:value-of select="@name" />
                <xsl:text disable-output-escaping="yes">"] ) ) { 
                    $query = $app->QUERY;
                    $query["</xsl:text>
                <xsl:value-of select="@name" />
                <xsl:text disable-output-escaping="yes">"] = "</xsl:text>
                <xsl:value-of select="@default" />
                <xsl:text disable-output-escaping="yes">";
                    $app->QUERY = $query;
                }</xsl:text>
            </xsl:for-each>
            
            <xsl:choose>
                <xsl:when test="$requestClass">
                    <xsl:text disable-output-escaping="yes">
                $app->request( \Adaptor_Bindings::create("\</xsl:text>
                    <xsl:value-of select="$requestClass" />
                    <xsl:text>") );</xsl:text>
                </xsl:when>
                <xsl:otherwise>
                    <xsl:text disable-output-escaping="yes">
                $app->request( null );</xsl:text>
                </xsl:otherwise>
            </xsl:choose>
            
            <xsl:text disable-output-escaping="yes">
                $usecase = $app->USECASES."\\</xsl:text><xsl:value-of select="@id" /><xsl:text disable-output-escaping="yes">";
                $usecase = new $usecase();
                $result = call_user_func_array(array(&amp;$usecase,"execute"),func_get_args());
                $app->responseHtml($result);
            } catch( \Exception $e ) {
                error_log($e->getLine().":".$e->getFile()." ".$e->getMessage());
                switch( $e->getCode() ) {</xsl:text>
        <xsl:for-each select="wadl:response[substring(@status,1,1) &gt; 3 and not(@status = '550') ]">
            <xsl:text disable-output-escaping="yes">
                    case </xsl:text><xsl:value-of select="@status" /><xsl:text disable-output-escaping="yes">:
                        $app->throwError($e);
                        break;</xsl:text>
        </xsl:for-each>
        <xsl:text disable-output-escaping="yes">
                    default:
                        $app->throwError(new \Exception("System error",550));
                        break;
                }
            }
        }
    );</xsl:text>
        <!--xsl:value-of select="translate(substring($resource,1,1),$smallcase,$uppercase)" />
        <xsl:value-of select="substring($resource,2)" />
        <xsl:text>:</xsl:text>
        <xsl:value-of select="@id"/>
        <xsl:text>");</xsl:text-->
        </xsl:for-each>
    
    </xsl:template>
    
    <xsl:template match="wadl:resource" mode="PATH">
        <xsl:text>/</xsl:text>
        <xsl:variable name="temp" select="wadl:method/wadl:request/wadl:param[@style='template' and not(@required='true')]" />
        <xsl:for-each select="ancestor-or-self::wadl:resource">
            <xsl:variable name="path">
                <xsl:choose>
                    <xsl:when test="position()!=1">
                        <xsl:value-of select="concat('/',@path)" />
                    </xsl:when>
                    <xsl:otherwise>
                        <xsl:value-of select="@path" />
                    </xsl:otherwise>
                </xsl:choose>
            </xsl:variable>
            <xsl:call-template name="REPLACE_NOT_REQUIRED">
                <xsl:with-param name="temp" select="$temp" />
                <xsl:with-param name="path" select="$path" />
            </xsl:call-template>
        </xsl:for-each>
    </xsl:template>
    
    <xsl:template name="REPLACE_NOT_REQUIRED">
        <xsl:param name="temp"/>
        <xsl:param name="path"/>
        <xsl:choose>
            <xsl:when test="contains($path,':')">
                <xsl:variable name="after">
                    <xsl:value-of select="substring-after($path, ':')"/>
                </xsl:variable>
                <xsl:variable name="before">
                    <xsl:value-of select="substring-before($path, ':')"/>
                </xsl:variable>
                <xsl:variable name="param">
                    <xsl:choose>
                        <xsl:when test="substring-before($after, '/')">
                            <xsl:value-of select="substring-before($after, '/')"/>
                        </xsl:when>
                        <xsl:otherwise>
                            <xsl:value-of select="$after" />
                        </xsl:otherwise>
                    </xsl:choose>
                </xsl:variable>
                
                <xsl:choose>
                    <xsl:when test="$temp[@name = $param]">
                        <xsl:value-of select="substring($before,1,(string-length($before) - 1))" />
                        <xsl:text>(/:</xsl:text>
                        <xsl:value-of select="$param" />
                        <xsl:text>)</xsl:text>
                        <!--xsl:message><xsl:value-of select="substring-after($after,$param)"/></xsl:message-->
                        <xsl:call-template name="REPLACE_NOT_REQUIRED">
                            <xsl:with-param name="temp" select="$temp" />
                            <xsl:with-param name="path" select="substring-after($after,$param)" />
                        </xsl:call-template>
                    </xsl:when>
                    <xsl:otherwise>
                        <xsl:value-of select="$before" />
                        <xsl:text>:</xsl:text>
                        <xsl:value-of select="$param" />
                        <xsl:call-template name="REPLACE_NOT_REQUIRED">
                            <xsl:with-param name="temp" select="$temp" />
                            <xsl:with-param name="path" select="substring-after($after,$param)" />
                        </xsl:call-template>
                    </xsl:otherwise>
                </xsl:choose>
            </xsl:when>
            <xsl:otherwise>
                <xsl:value-of select="$path" />
            </xsl:otherwise>
        </xsl:choose>
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
