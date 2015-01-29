<?php 
	
class Hooks_delete_content extends Hooks {

	var $meta = array(
		'name'       => 'Delete Content - makes it possible to delete contentfiles',
		'version'    => '1.0',
		'author'     => 'Joakim Bording',
		'author_url' => 'http://joakim.bording.no/'
	);
	

	public function request__post()
	{

		if (array_get($_POST, 'delete_content')) {
			$filename = array_get($_POST, 'delete_content');	

			// Remove subdirectory
			$array = explode("/", $filename);
			unset($array[0]);
			unset($array[1]);			
			$filename = '/'.implode("/", $array);
			
			// Ad in order elements				
			$filename = Path::resolve($filename);			
			
			// Construct the full url
			$filename = Config::getSiteRoot().'_content'.$filename.'.html';
			
			// Add below webroot
			$filename = Path::fromAsset($filename);

			// Delete file
			FILE::delete($filename);
			
			// Redirect to avoid refresh problems
			$currenturl = URL::getCurrent();			
			URL::redirect($currenturl);
		}
	}

}

?>