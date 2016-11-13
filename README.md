# Happymeal
xsd to php classes generator, wadl to php code generator(soon)

## Install happymeal project

```
mkdir -p /path_to_project/project_name
cd /path_to_project/project_name
mkdir -p vendor
cd vendor
git clone https://github.com/servandserv/happymeal.git
cp /happymeal/happymeal.ini /path_to_project/project_name
```

## XSD to PHP classes generator

### Generate code

1. Configurate happymeal.ini file 
2. Run the bash script
```
path_to_happymeal/happymeal xsd2php path_to_project/project_name/happymeal.ini
```
### Use php code

1. Include classes to project
2. Use data classes

Read xml file and parser to object
```
$obj = new \namespace\Object();
if($xmlstr = file_get_contents('file_path')) {
  $obj->fromXmlStr($xmlstr);
}
```
Translate object to xml str
```
$obj = new \namespace\Object();
$obj->setProp1("prop1");
$obj->setProp2("prop2");
$xmlstr = $obj->toXmlStr();
```
