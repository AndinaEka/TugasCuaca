<?php
  $json_string = file_get_contents("http://api.wunderground.com/api/bcda6a43d721358a/conditions/q/ID/Lempongsari.json");
  $parsed_json = json_decode($json_string);
  $location = $parsed_json->{'current_observation'}->{'display_location'}->{'city'};
  $weather = $parsed_json->{'current_observation'}->{'weather'};
  $temph_c = $parsed_json->{'current_observation'}->{'temp_c'};
  $wind_mph= $parsed_json->{'current_observation'}->{'wind_mph'};
  $wind_dir= $parsed_json->{'current_observation'}->{'wind_dir'};
  $time= $parsed_json->{'current_observation'}->{'local_time_rfc822'};
  echo "Kita berada di : ${location} \n";
  echo ' <br>';
  echo "Cuaca : ${weather} \n"; 
  echo ' <br>';
  echo "Suhu : ${temph_c} \n"; 
  echo ' <br>';
  echo "Kecepatan Angin : ${wind_mph} \n"; 
  echo ' <br>';
  echo "Arah Angin : ${wind_dir} \n"; 
  echo ' <br>';
  echo "Hari, tanggal, bulan,tahun, jam : ${time} \n"; 
?>
