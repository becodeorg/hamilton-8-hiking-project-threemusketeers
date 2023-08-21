
<form method="post" action="/tags/update">
    <label for="name">Tag name</label>
    <input type="text" value="<?=$tag->name?>" name="name" id="name">
    <input type="hidden" name="tagID" value="<?=$tag->id?>">
    <input type="submit" value="mise à jours">
</form>