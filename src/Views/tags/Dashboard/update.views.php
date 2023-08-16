
<form method="post" action="/tags/update">
    <label for="name"> le nom du tags</label>
    <input type="text" value="<?=$tag->name?>" name="name" id="name">
    <input type="hidden" name="tagID" value="<?=$tag->id?>">
    <input type="submit" value="mise à jours">
</form>