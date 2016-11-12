<?php

namespace \com\servandserv\happymeal\WADL;

abstract class AbstractFactory
{
    
    /**
     * create application
     *
     * @return \com\servandserv\happymeal\WADL\Application
     */
    abstract public function createApplication();
    
    /**
     * create resources
     * 
     * @param string base A resources element has a base attribute of type xsd:anyURI that provides the base URI for each child resource identifier.
     *
     * @return \com\servandserv\happymeal\WADL\Resources
     */
    abstract public function createResources($base);
    
    /**
     * Creates resource.
     *
     * @param string id An optional attribute of type xsd:ID that identifies the resource element.
     * @param string path An optional attribute of type xsd:string. If present, it provides a relative URI
     *                    template for the identifier of the resource. The resource's base URI is given by the
     *                    resource element's parent resource or resources element.
     * @param string queryType Defines the media type for the query component of the resource URI. Defaults to
     *                         'application/x-www-form-urlencoded' if not specified which results in query
     *                         strings being formatted as specified in section 17.13 of HTML 4.01
     *
     * @return \com\servandserv\happymeal\WADL\Resource
     */
    abstract public function createResource($id=NULL,$path=NULL,$queryType="application/x-www-form-urlencoded");

    /**
     * Creates method
     *
     * @param string name Indicates the HTTP method used.
     *
     * @return \com\servandserv\happymeal\WADL\Method
     */
    abstract public function createMethod($name);

    /**
     * Created request
     *
     * @return \com\servandserv\happymeal\WADL\Request
     */
    abstract public function createRequest();

    /**
     * Created response
     *
     * @param string status Optionally present on responses, provides a list of HTTP status codes associated with a particular response.
     * 
     * @return \com\servandserv\happymeal\WADL\Response
     */
    abstract public function createResponse($status);

     /**
      *
      * Creates param
      *
      * @param string name The name of the parameter as an xsd:NMTOKEN. Required.
      * @param string style Indicates the parameter style (matrix,header,query,template,plain)
      * @param string default Optionally provides a value that is considered identical to an unspecified parameter value.
      * @param string fixed Optionally provides a fixed value for the parameter.*
      * @param string path path to the value of the parameter within the representation.
      *
      * @return \com\servandserv\happymeal\WADL\Param
      */
     abstract public function createParam($name,$style,$default=NULL,$fixed=NULL,$path=NULL);
     
     /**
      *
      * Create option
      * 
      * @param string value A required attribute that defines one of the possible values of the parent parameter 
      * @param string mediaType When present this indicates that the parent parameter acts as a media type selector for responses. 
      *                         The value of the attribute is the media type that is expected when the parameter has the value given in the value attribute.
      *
      * @return \com\servandserv\happymeal\WADL\Option
      */
     abstract public function createOption($value,$mediaType);
     
     /**
      * 
      * Creates representation
      * 
      * @param string mediaType Indicates the media type of the representation. Media ranges (e.g. text/*) are acceptable and indicate 
      *                         that any media type in the specified range is supported.
      * @param string element For XML-based representations, specifies the qualified name of the root element as described within the grammars section
      * @param string profile Similar to the HTML profile attribute, gives the location of one or more meta data profiles, separated by white space. 
      *                       The meta-data profiles define the meaning of the rel and rev attributes of descendent link elements 
      *
      * @return \com\servandserv\happymeal\WADL\Representation
      */
     abstract public function createRepresentation($mediaType,$element=NULL,$profile=NULL);
}