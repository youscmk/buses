<?php 

$cadena='hash=313bcf73d4cab8b8934bae1556b273e2&title=Informe%20de%20evento&trackers=%5B10180284%2C10180279%5D&from=2023-07-03%2000%3A00%3A00&to=2023-07-03%2023%3A59%3A59&time_filter=%7B%22from%22%3A%2200%3A00%22%2C%22to%22%3A%2223%3A59%22%2C%22weekdays%22%3A%5B1%2C2%2C3%2C4%2C5%2C6%2C7%5D%7D&plugin=%7B%22hide_empty_tabs%22%3Atrue%2C%22plugin_id%22%3A11%2C%22show_seconds%22%3Afalse%2C%22group_by_type%22%3Afalse%2C%22event_types%22%3A%5B%22output_change%22%5D%7D'
;
echo urldecode($cadena) ;

$cadenaUrl='hash=313bcf73d4cab8b8934bae1556b273e2
&title=Informe de evento
&trackers=[10180284,10180279]
&from=2023-07-03 00:00:00
&to=2023-07-03 23:59:59
&time_filter={"from":"00:00","to":"23:59","weekdays":[1,2,3,4,5,6,7]}&plugin={"hide_empty_tabs":true,"plugin_id":11,"show_seconds":false,"group_by_type":false,"event_types":["output_change"]}';


?>