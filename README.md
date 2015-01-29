# statamic-delete-content
A Statamic add-on that enables you to delete content files by a post request. You could for instance let members delete entries, or content created by the Reven add-on, without going into the admin interface. 

Example markup
```html
{{ entries:listing folder="blogs" }}
{{ title }}
<form action="" method="post">
	<input type="hidden" name="delete_content" value="{{ url }}"/>					
	<button type="submit">Delete entry</button>
</form>	
{{ /entries:listing }}	
```