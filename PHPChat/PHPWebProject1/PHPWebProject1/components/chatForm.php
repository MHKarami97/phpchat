<form class="chat_form">
    <div class="chat_container">
        <div class="form_input">
            <textarea id="sendMessage" class="textarea_controll" placeholder="پیغام خود را بنویسید"></textarea>
        </div><!--Close form_input-->
        <div class="form_input">
            <label for="upload_files" id="upload_label">
                <i class="fas fa-paperclip fa_upload"></i>
                <i class="fas fa-file-image fa_upload"></i>
            </label>
            <input type="file" id="upload_files" class="files_upload" name="sendFile" />
        </div><!--Close form_input-->
    </div><!--Close chat_container-->
    <div class="file_error">       
    </div><!--Close file_error-->
</form><!--Close chat_form-->