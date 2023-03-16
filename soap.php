<?php 


$location="http://wsmultipro.gpschile.com/Registro?wsdl";

$request='<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:ws="http://ws.multip.gpschile.smartdici/">
<soapenv:Header/>
<soapenv:Body>
   <ws:cargaActividades>
  
      <actividad>
       
         <datosActividad>
            <codConductor>12</codConductor>
            <codTipoEvento>3</codTipoEvento>
         
            <datosExternos>SinDatos</datosExternos>
            <distanciaIncremental>1</distanciaIncremental>
            <distanciaViaje>10</distanciaViaje>
        
            <fechaHoraActividad>10:00</fechaHoraActividad>
       
            <fechaHoraRecepcion>10:00</fechaHoraRecepcion>
            <hdg>10</hdg>
            <hdop>1</hdop>
            <horometro>34</horometro>
       
            <ignicion>1</ignicion>
           
            <imei>12345676678</imei>
            <latitud>-33.47314</latitud>
            <longitud>-70.6860983</longitud>
      
            <nomConductor>luis2</nomConductor>
     
            <nomTipoEvento>parked</nomTipoEvento>
            <numSatelites>5</numSatelites>
            <odometro>12000</odometro>
            <puerto>1</puerto>
            <t1>10</t1>
            <t2>10</t2>
            <t3>10</t3>
            <t4>10</t4>
           
            <tipoEvento>1</tipoEvento>
        
            <ubicacion>parque</ubicacion>
            <velocidad>50</velocidad>
            <velocidadMaxima>70</velocidadMaxima>
         </datosActividad>
       
         <datosCliente>
         
            <cliente>10520823-5</cliente>
          
            <flota>
               <codigo>3</codigo>
             
               <nombre>tandem</nombre>
            </flota>
    
            <grupo>
               <codigo>4</codigo>
      
               <nombre>mineria</nombre>
            </grupo>
       
            <operador>
        
               <digito>1</digito>
       
               <nombre>contratista</nombre>
   
               <rut>126733089</rut>
            </operador>
        
            <password>1234</password>
     
            <proveedor>
             
               <digito>6</digito>
            
               <nombre>dorian</nombre>
           
               <rut>12673308</rut>
            </proveedor>
         
            <proveedorGps>
            
               <digito>12</digito>
           
               <nombre>wit</nombre>
            
               <rut>18467567</rut>
            </proveedorGps>
         
            <vehiculo>
               <codigo>10</codigo>
          
               <nombre>n234</nombre>
            
               <patente>hhhh23</patente>
            </vehiculo>
         </datosCliente>
      </actividad>
   </ws:cargaActividades>
</soapenv:Body>
</soapenv:Envelope>';


// print("Request: <br>");
//print ("<prep>.$request.<prep>");

$action="cargaActividades";

$headers = [
   'Method: POST',
    'Connection: Keep-Alive',
    'User-Agent: PHP-SOAP-CURL',
    'Content-Type: text/xml; charset=utf-8',
    'SOAPAction: cargaActividades'
];

$ch=curl_init($location);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER,$headers);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS,$request);
curl_setopt($ch, CURLOPT_HTTP_VERSION,CURL_HTTP_VERSION_1_1);

$response= curl_exec($ch);

print("Response: <br>");
print ("<prep>.$response.<prep>");

?>