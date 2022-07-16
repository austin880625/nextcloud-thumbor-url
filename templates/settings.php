<?php
script('thumborurl', 'thumborurl_settings');
?>
<div id="thumborurl-root" class="section">
<h2>ThumborUrl Settings</h2>

<form action="#">
    <div>
        <label for="thumbor_base">Thumbor server base url:</label>
        <input type="text" name="thumbor_base" value="<?php echo $_['thumbor_base']; ?>"/>
    </div>
    <div>
        <label for="thumbor_dir">Thumbor server base dir:</label>
        <input type="text" name="thumbor_dir" value="<?php echo $_['thumbor_dir']; ?>"/>
    </div>
    <div>
        <label for="thumbor_key">Thumbor server security key:</label>
        <input type="password" name="thumbor_key" value="<?php echo $_['thumbor_key']; ?>"/>
    </div>
    <div>
        <button id="thumborurl-save-btn" type="button">Save</button>
    </div>
</form>
</div>
