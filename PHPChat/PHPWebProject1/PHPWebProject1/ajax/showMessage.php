<?php
include "../init.php";

$obj= new baseClass;

if(isset($_GET['message'])){

    if(isset($_SESSION['userId'])){

        $user_id= $_SESSION['userId'];
    }
    else{
        header("location:login.php");
    }
    if($obj->NormalQuery("SELECT message_id FROM clean WHERE user_id=?",[$user_id])){

        $last_msg_row= $obj->SingleResult();
        $last_msg_id= $last_msg_row->message_id;

        $obj->NormalQuery("SELECT id FROM messages ORDER BY id DESC LIMIT 1");
        $msg_row= $obj->SingleResult();
        $msg_table_id= $msg_row->id;

        $obj->NormalQuery("SELECT * FROM messages INNER JOIN users ON messages.user_id=users.id WHERE messages.id BETWEEN $last_msg_id AND $msg_table_id ORDER BY messages.id ASC");

        if($obj->CountRows() == 0){

            echo '<div class="left_message common_margin">
                                <div class="sender_img_block">
                                    <img src="assets/img/mainBack.jpg" class="sender_img" />
                                    <span class="online_icon"></span>
                                </div><!--Close sender_img_block-->
                                <div class="left_msg_block">
                                    <div class="user_name_date">
                                        <span class="sender_name">
                                            messanger
                                        </span><!--Close sender_name-->
                                        <span class="date_time">
                                            now
                                        </span><!--Close date_time-->
                                    </div><!--Close user_name_date-->
                                    <div class="left_msg">
                                        <p>
                                            lets start chat
                                        </p>
                                    </div><!--Close left_msg-->
                                </div><!--Close left_msg_block-->
                            </div><!--Close left_message-->';
        }
        else{

            $message_row= $obj->FetchAll();

            foreach($message_row as $informations):

                $full_name= $informations['name'];
                $user_image= $informations['image'];
                $user_status= $informations['status'];
                $message= $informations['message'];
                $msg_type= $informations['type'];
                $db_user_id= $informations['user_id'];
                $msg_time= $obj->TimeAgo($informations['time']);

                if($user_status == 0){

                    $user_now_status= '<span class="offline_icon"></span>';
                }
                elseif($user_status == 1){

                    $user_now_status= '<span class="online_icon"></span>';
                }

                if($db_user_id == $user_id){

                    if($msg_type == "text"){

                        echo '<div class="right_message common_margin">
                                <div class="right_msg_area">
                                    <span class="date_time right_time">
                                        '.$msg_time.'
                                        <span class="send_msg">&#10004</span>
                                    </span><!--Close date_time-->
                                    <div class="right_msg">
                                        <p>
                                        '.$message.'
                                        </p>
                                    </div><!--Close right_msg-->
                                </div><!--Close right_msg_area-->
                            </div><!--Close right_message-->';
                    }
                    elseif($msg_type == "emoji"){

                        echo '<div class="right_message common_margin">
                                <div class="right_msg_area">
                                    <span class="date_time right_time right_msg_time">
                                        '.$msg_time.'
                                    </span><!--Close date_time-->
                                    <div class="right_file emoji_right">
                                        <img src="'.$message.'" class="emoji_image" />
                                    </div><!--Close right_msg-->
                                </div><!--Close right_msg_area-->
                            </div><!--Close right_message-->';
                    }
                    elseif($msg_type == "jpg" || $msg_type == "jpeg" || $msg_type == "JPG" || $msg_type == "JPEG"){

                        echo '<div class="right_message common_margin">
                                <div class="right_msg_area">
                                    <span class="date_time right_time right_msg_time">
                                        '.$msg_time.'
                                    </span><!--Close date_time-->
                                    <div class="right_file">
                                        <img src="assets/img/file/'.$message.'" class="commen_image" />
                                    </div><!--Close right_msg-->
                                </div><!--Close right_msg_area-->
                            </div><!--Close right_message-->';
                    }
                    elseif($msg_type == "png" || $msg_type == "PNG"){

                        echo '<div class="right_message common_margin">
                                <div class="right_msg_area">
                                    <span class="date_time right_time right_msg_time">
                                        '.$msg_time.'
                                    </span><!--Close date_time-->
                                    <div class="right_file">
                                        <img src="assets/img/file/'.$message.'" class="commen_image" />
                                    </div><!--Close right_msg-->
                                </div><!--Close right_msg_area-->
                            </div><!--Close right_message-->';
                    }
                    elseif($msg_type == "zip" || $msg_type == "ZIP"){

                        echo '<div class="right_message common_margin">
                                <div class="right_msg_area">
                                    <span class="date_time right_time right_msg_time">
                                        '.$msg_time.'
                                    </span><!--Close date_time-->
                                    <div class="right_file file_right">
                                        <a href="assets/img/file/'.$message.'" class="all_files"><i class="fas fa-arrow-circle-down"></i>'.$message.'</a>
                                    </div><!--Close right_msg-->
                                </div><!--Close right_msg_area-->
                            </div><!--Close right_message-->';
                    }
                    elseif($msg_type == "pdf" || $msg_type == "PDF"){

                        echo '<div class="right_message common_margin">
                                <div class="right_msg_area">
                                    <span class="date_time right_time right_msg_time">
                                        '.$msg_time.'
                                    </span><!--Close date_time-->
                                    <div class="right_file file_right">
                                        <a href="assets/img/file/'.$message.'" class="all_files"><i class="fas fa-arrow-circle-down"></i>'.$message.'</a>
                                    </div><!--Close right_msg-->
                                </div><!--Close right_msg_area-->
                            </div><!--Close right_message-->';
                    }
                    elseif($msg_type == "rar" || $msg_type == "RAR"){

                        echo '<div class="right_message common_margin">
                                <div class="right_msg_area">
                                    <span class="date_time right_time right_msg_time">
                                        '.$msg_time.'
                                    </span><!--Close date_time-->
                                    <div class="right_file file_right">
                                        <a href="assets/img/file/'.$message.'" class="all_files"><i class="fas fa-arrow-circle-down"></i>'.$message.'</a>
                                    </div><!--Close right_msg-->
                                </div><!--Close right_msg_area-->
                            </div><!--Close right_message-->';
                    }
                    elseif($msg_type == "docx" || $msg_type == "DOCX"){

                        echo '<div class="right_message common_margin">
                                <div class="right_msg_area">
                                    <span class="date_time right_time right_msg_time">
                                        '.$msg_time.'
                                    </span><!--Close date_time-->
                                    <div class="right_file file_right">
                                        <a href="assets/img/file/'.$message.'" class="all_files"><i class="far fa-file-word"></i>'.$message.'</a>
                                    </div><!--Close right_msg-->
                                </div><!--Close right_msg_area-->
                            </div><!--Close right_message-->';
                    }
                }
                else{

                    if($msg_type == "text"){

                        echo '<div class="left_message common_margin">
                                <div class="sender_img_block">
                                    <img src="assets/img/profile/'.$user_image.'" class="sender_img" />
                                    '.$user_now_status.'
                                </div><!--Close sender_img_block-->
                                <div class="left_msg_block">
                                    <div class="user_name_date">
                                        <span class="sender_name">
                                            '.$full_name.'
                                        </span><!--Close sender_name-->
                                        <span class="date_time">
                                            '.$msg_time.'
                                        </span><!--Close date_time-->
                                    </div><!--Close user_name_date-->
                                    <div class="left_msg">
                                        <p>
                                            '.$message.'
                                        </p>
                                    </div><!--Close left_msg-->
                                </div><!--Close left_msg_block-->
                            </div><!--Close left_message-->';
                    }
                    elseif($msg_type == "emoji"){

                        echo '<div class="left_message common_margin">
                                <div class="sender_img_block">
                                    <img src="assets/img/profile/'.$user_image.'" class="sender_img" />
                                    '.$user_now_status.'
                                </div><!--Close sender_img_block-->
                                <div class="left_msg_block">
                                    <div class="user_name_date">
                                        <span class="sender_name">
                                            '.$full_name.'
                                        </span><!--Close sender_name-->
                                        <span class="date_time">
                                            '.$msg_time.'
                                        </span><!--Close date_time-->
                                    </div><!--Close user_name_date-->
                                    <div class="left_file emoji_right">
                                        <img src="'.$message.'" class="emoji_image" />
                                    </div><!--Close left_msg-->
                                </div><!--Close left_msg_block-->
                            </div><!--Close left_message-->';
                    }
                    elseif($msg_type == "jpg" || $msg_type == "jpeg" || $msg_type == "JPG" || $msg_type == "JPEG"){

                        echo '<div class="left_message common_margin">
                                <div class="sender_img_block">
                                    <img src="assets/img/profile/'.$user_image.'" class="sender_img" />
                                    '.$user_now_status.'
                                </div><!--Close sender_img_block-->
                                <div class="left_msg_block">
                                    <div class="user_name_date">
                                        <span class="sender_name">
                                            '.$full_name.'
                                        </span><!--Close sender_name-->
                                        <span class="date_time">
                                            '.$msg_time.'
                                        </span><!--Close date_time-->
                                    </div><!--Close user_name_date-->
                                    <div class="left_file">
                                        <img src="assets/img/file/'.$message.'" class="commen_image" />
                                    </div><!--Close right_msg-->
                                    </div><!--Close left_msg-->
                                </div><!--Close left_msg_block-->
                            </div><!--Close left_message-->';
                    }
                    elseif($msg_type == "png" || $msg_type == "PNG"){

                        echo '<div class="left_message common_margin">
                                <div class="sender_img_block">
                                    <img src="assets/img/profile/'.$user_image.'" class="sender_img" />
                                    '.$user_now_status.'
                                </div><!--Close sender_img_block-->
                                <div class="left_msg_block">
                                    <div class="user_name_date">
                                        <span class="sender_name">
                                            '.$full_name.'
                                        </span><!--Close sender_name-->
                                        <span class="date_time">
                                            '.$msg_time.'
                                        </span><!--Close date_time-->
                                    </div><!--Close user_name_date-->
                                    <div class="left_file">
                                        <img src="assets/img/file/'.$message.'" class="commen_image" />
                                    </div><!--Close right_msg-->
                                </div><!--Close left_msg_block-->
                            </div><!--Close left_message-->';
                    }
                    elseif($msg_type == "zip" || $msg_type == "ZIP"){

                        echo '<div class="left_message common_margin">
                                <div class="sender_img_block">
                                    <img src="assets/img/profile/'.$user_image.'" class="sender_img" />
                                    '.$user_now_status.'
                                </div><!--Close sender_img_block-->
                                <div class="left_msg_block">
                                    <div class="user_name_date">
                                        <span class="sender_name">
                                            '.$full_name.'
                                        </span><!--Close sender_name-->
                                        <span class="date_time">
                                            '.$msg_time.'
                                        </span><!--Close date_time-->
                                    </div><!--Close user_name_date-->
                                    <div class="left_file file_right">
                                        <a href="assets/img/file/'.$message.'" class="all_files"><i class="fas fa-arrow-circle-down"></i>'.$message.'</a>
                                    </div><!--Close right_msg-->
                                </div><!--Close left_msg_block-->
                            </div><!--Close left_message-->';
                    }
                    elseif($msg_type == "pdf" || $msg_type == "PDF"){

                        echo '<div class="left_message common_margin">
                                <div class="sender_img_block">
                                    <img src="assets/img/profile/'.$user_image.'" class="sender_img" />
                                    '.$user_now_status.'
                                </div><!--Close sender_img_block-->
                                <div class="left_msg_block">
                                    <div class="user_name_date">
                                        <span class="sender_name">
                                            '.$full_name.'
                                        </span><!--Close sender_name-->
                                        <span class="date_time">
                                            '.$msg_time.'
                                        </span><!--Close date_time-->
                                    </div><!--Close user_name_date-->
                                    <div class="left_file file_right">
                                        <a href="assets/img/file/'.$message.'" class="all_files"><i class="fas fa-arrow-circle-down"></i>'.$message.'</a>
                                    </div><!--Close right_msg-->
                                </div><!--Close left_msg_block-->
                            </div><!--Close left_message-->';
                    }
                    elseif($msg_type == "rar" || $msg_type == "RAR"){

                        echo '<div class="left_message common_margin">
                                <div class="sender_img_block">
                                    <img src="assets/img/profile/'.$user_image.'" class="sender_img" />
                                    '.$user_now_status.'
                                </div><!--Close sender_img_block-->
                                <div class="left_msg_block">
                                    <div class="user_name_date">
                                        <span class="sender_name">
                                            '.$full_name.'
                                        </span><!--Close sender_name-->
                                        <span class="date_time">
                                            '.$msg_time.'
                                        </span><!--Close date_time-->
                                    </div><!--Close user_name_date-->
                                    <div class="left_file file_right">
                                        <a href="assets/img/file/'.$message.'" class="all_files"><i class="fas fa-arrow-circle-down"></i>'.$message.'</a>
                                    </div><!--Close right_msg-->
                                </div><!--Close left_msg_block-->
                            </div><!--Close left_message-->';
                    }
                    elseif($msg_type == "docx" || $msg_type == "DOCX"){

                        echo '<div class="left_message common_margin">
                                <div class="sender_img_block">
                                    <img src="assets/img/profile/'.$user_image.'" class="sender_img" />
                                    '.$user_now_status.'
                                </div><!--Close sender_img_block-->
                                <div class="left_msg_block">
                                    <div class="user_name_date">
                                        <span class="sender_name">
                                            '.$full_name.'
                                        </span><!--Close sender_name-->
                                        <span class="date_time">
                                            '.$msg_time.'
                                        </span><!--Close date_time-->
                                    </div><!--Close user_name_date-->
                                    <div class="left_file file_right">
                                        <a href="assets/img/file/'.$message.'" class="all_files"><i class="far fa-file-word"></i>'.$message.'</a>
                                    </div><!--Close right_msg-->
                                </div><!--Close left_msg_block-->
                            </div><!--Close left_message-->';
                    }
                }
            endforeach;
        }
    }
}
?>