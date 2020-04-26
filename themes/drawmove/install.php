<?php
define('DS', '/');
define('NL', "\n");

function copy_r( $path, $dest, $overwrite = false)
{
    if( is_dir($path) )
    {
    	if(!file_exists($dest))
		{
       	 	@mkdir( $dest );
			echo ' * Created Dir: '.$dest.'<br/>';
		}
		else 
		{
			echo ' * Entering Dir: '.$dest.'<br/>';
		}
		
        $objects = scandir($path);
        if( sizeof($objects) > 0 )
        {
            foreach( $objects as $file )
            {
                if( $file == "." || $file == ".." )
                    continue;
                // go on
                if( is_dir( $path.DS.$file ) )
                {
                    copy_r( $path.DS.$file, $dest.DS.$file , $overwrite);
                }
                else
                {
                	if(file_exists($dest.DS.$file) && !$overwrite) 
                	{
                		echo ' * File '.$dest.DS.$file.' Already exist. Skipping...<br/>';
                		continue;
					}
					
                    $c = copy( $path.DS.$file, $dest.DS.$file );
					
					if($c) echo ' * Copied File: '.$dest.DS.$file.'<br/>';
					else echo ' *!* Error Copying File: '.$dest.DS.$file.'<br/>';
                }
            }
        }
        return true;
    }
    elseif( is_file($path) )
    {
    	if(file_exists($dest) && !$overwrite)
		{
    		echo ' * File '.$dest.' Already exist. Skipping...<br/>';
    		return 1;
		}
		
		
    	$c = copy($path, $dest);
		
		if($c) echo ' * Copied File: '.$dest.'<br/>';
		else echo ' *!* Error Copying File: '.$dest.'<br/>';
		
		return $c;
    }
    else
    {
        return false;
    }
}


function	readConf($filename)
{
	$dict = array();
	   	
	$notes = file_get_contents('version');
	$lines = preg_split('/'.NL.'/', trim($notes));
	foreach($lines as $line) {
		$line = preg_split('/:/', $line);
		$dict[trim($line[0])] = trim($line[1]);
	}
	
	return $dict;
}

function	saveConf($conf)
{
	$data = 'version:'.$conf['version'].NL.'installed:'.$conf['installed'].NL;
	   	
	file_put_contents('version', $data);
}


?>



<?php
	
// ============= INSTALLATION ====================
$conf = readConf('version');

// Check if not already installed.
if($conf['installed'] == 'yes')  {
	echo '<h1>Theme already installed</h1>';
	echo 'To reinstall the theme, open "version" file and change the value of [installed] to [no]';
	die();
}

// Not installed, Install it!
echo '<h1>Installing DrawMove Free Flux Theme</h1>';

echo '<h3>Copying [images] folder to [FluxCP] root</h3>';
copy_r('./images', '../../images', false);

// Look for 'default' theme. Make a copy of all files which doesn't exists yet in the drawmove theme.

echo '<h3>Copying [default] Themes Files</h3>';
copy_r('../default', '.', false);

// Look for any addon with theme files. Copy theme to drawmove folder.

echo '<h3>Looking for Addons Themes Files</h3>';
$path = '../../addons';
$addons = scandir($path);

foreach( $addons as $file )
{
    if( is_dir( $path.DS.$file ) )
    {
    	$p = $path.DS.$file.DS.'themes'.DS.'default';
    	if(!file_exists($p)) continue;
		echo '<h4>Getting View Files From Addon: '.$file.' </h4>';
        copy_r( $path.DS.$file.DS.'themes'.DS.'default', '.', false);
    }
}


// Replace value in theme.
echo '<h3>Setting Theme Name in [config/application.php]</h3>';
$content = file_get_contents('../../config/application.php');
$content  = preg_replace("#'ThemeName'([\t ]*)=>([\t ]*)(.+),#", "'ThemeName'            =>'Drawmove_Free_FluxCP_Theme',", $content). ' changed.';file_put_contents('../../config/application.php', $content);
echo 'Done';

$conf['installed'] = 'yes';
saveConf($conf);

echo "<h3>Theme Installed! We hope you'll enjoy DrawMove Free Theme! </h3>";


?>