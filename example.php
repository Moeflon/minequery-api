<?php
/**
 *  Minequery API examples
 */

// Require the class
require_once("minequery.class.php");

// Load object
$mq = new Minequery('Creative'); // Replace 'Creative' by your server name (in your serverpage's URL)

// Dump all data
$mq->dump();

/**
 * Specific information examples (You can see the available information and structure in the dump)
 */
// IGNORE echo "<hr/>"; THIS IS TO MAKE THE EXAMPLE LOOK A LITTLE NICER IF YOU VISIT IT
// Server name, ip, status, ...
echo $mq->data->name;
echo "<hr/>";
echo $mq->data->ip;
echo "<hr/>";
echo $mq->data->status;
echo "<hr/>";

// Amount of online players
echo $mq->data->players->count;
echo "<hr/>";

// Get an array of online players
var_dump($mq->data->players->names);
echo "<hr/>";

// You get idea, right?

/**
 * Advanced functions examples
 */
 
// Generate a string containing information about your server (this can be done with raw data too, but might be easier for some)
echo $mq->text('The server {name} currently has {count}/{max} players online with an uptime of {uptime}%', 'Oops, this server is offline');
echo "<hr/>";

// Output the playerheads of your last voters using the votersFormat function
echo $mq->votersFormat('times', '<img src="http://aeolus.minequery.net/?p={player}&s=10"></img> {player}: {times}', '<hr/>', 5);
?>
<!-- Javascript API examples -->
<!-- 
  Embed a playerlist 
  You can get this code on your server's page under the player tab if your server has querying enabled.
  (You can also just replace 'Creative' in the src with your server name)
-->
<script src="http://minequery.net/api/playerlist/Creative.js"></script>

<hr/>

<!-- 
  Embed a player graph 
  You can get this code on your server's page under the player tab.
  (You can also just replace 'Creative' in the src with your server name)
-->
<script src="http://minequery.net/api/players/Creative.js"></script>

<hr/>

<!-- 
  Embed a vote button 
  You can get this code on your server's vote page.
  (You can also just replace 'Creative' in the src with your server name)
-->
<script src="http://minequery.net/api/button/Creative.js"></script>

<hr/>

<!-- 
  Embed banners
  You can get this code on your server's page under the banner tab.
  (You can also just replace 'Creative' in the src with your server name)
-->
<img src="http://minequery.net/banner/Creative.png" width="486px" height="60px"></img>
<img src="http://minequery.net/banner/big/Creative.png" width="500px" height="80px"></img>
