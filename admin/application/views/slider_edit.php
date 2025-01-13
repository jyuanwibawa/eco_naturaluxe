<div class="container">
    <h5>Edit slider</h5>
    
    <form method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label>Caption Slider </label>
            <textarea class="form-control" id="editorku" name="caption_slider"><?php echo set_value ("caption_slider", $slider['caption_slider'])?></textarea>
            <span class="text-danger small">
                <?php echo form_error('caption_slider') ?>
            </span>
        </div>
        <div class="mb-3">
            <label>Foto Lama</label><br>
            <img src="<?php echo $this->config->item('url_slider') . (isset($slider['foto_slider']) ? $slider['foto_slider'] : ''); ?>" width="300">
        </div>
        <div class="mb-3">
            <label>Ganti Foto slider</label>
            <input type="file" name="foto_slider" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
