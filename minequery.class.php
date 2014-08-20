<?php
/**
 * @author Minequery <support@minequery.net>
 * @param string $server (ID String of your server, found in your server's URL)
 */
class Minequery
{
    function __construct($server, $key = false)
    {
        $this->domain = "http://minequery.net/api/";
        $this->server = $server;
        $this->data   = json_decode(file_get_contents($this->domain . $this->server . '.json'));
    }
    
    function Minequery()
    {
        $this->construct__();
    }
    
    /**
     * Return voters
     * @param string $type (recent|times)
     * @return array
     */
    public function voters($type = 'recent')
    {
    	if(!in_array($type, array('recent', 'times')))
    		return "Invalid parameter";
    		
        return $this->data->votes->players->$type;
    }
    
    /**
     * Return HTML code for last voters
     * @param string $type (recent|times)
     * @param string $html (Placeholder for your html, use {player} for Player name)
     * @param string $separator (Optional string to put after each iteration except for the last one)
     * @param string $times (Amount of likers you want to have, put 0 for all of them)
     * @return string
     */
    public function votersFormat($type = 'recent', $html = '{player}', $separator = '', $repeat = 5)
    {
        $voters = $this->voters($type);
        $output = "";
        $num    = 0;
		
		switch($type) {
			case 'recent':
				$key = 'key';
				$value = 'voter';
				break;
			case 'times':
				$key = 'voter';
				$value = 'times';
				break;	
		}
		
        foreach ($voters as ${$key} => ${$value}) {
            $output .= str_replace(array('{player}', '{times}'), array($voter, $times), $html);
            $num++;
            if ($num == $repeat) {
                break;
            } else {
                $output = $output . $separator;
            }
        }
        return $output;
    }
    
    /**
     * Return text for server status
     * @param string $format (Format for the status string, use {count} for online players, {max} for maximum players and {name} for server name with an uptime of {uptime})
     * @param string $offline (Text to return if the server is offline)
     * @return string 
     */
    public function text($format, $offline = 'The server is offline')
    {
    	if($this->data->status === "offline")
    		return $offline;
    		
        $format = str_replace('{count}', $this->data->players->count, $format);
        $format = str_replace('{max}', $this->data->players->max, $format);
        $format = str_replace('{name}', $this->data->name, $format);
        $format = str_replace('{uptime}', $this->data->uptime, $format);
        return $format;
    }
    
    /**
     * Dump raw data, could be useful if one needs to know what data is supplied 
     * @return void
     */
     public function dump()
     {
	     echo "<pre>";
	     var_dump($this->data);
	     echo "</pre>";
     }
}
