<?php
require_once __DIR__ .'/../../model/main-model.php';

$parents = getParentMenus();
$menuPositions = MENU_POSITIONS;
if(!empty($_SESSION['user'])){
    $loggedUserImage = getImage($_SESSION['user']['id'],'user',$_SESSION['user']['avatar']);
        $controller = $_GET['controller'];
        if(!empty($controller)){
            switch ($controller){
                case 'logout':
                    session_destroy();
                    header("Location:/admin");
                break;
                ##################### MENU CRUD  ###################
                case 'menu':
                    $menus = getAllMenus();
                    require_once  ADMIN_VIEW . '/menu.php';
                break;
                case 'menu_add':

                    if(!empty($_POST)){

                        $title = $_POST['title'];
                        $link = $_POST['link'];
                        $position = $_POST['position'];
                        $order_by = $_POST['order_by'];
                        $parent = $_POST['parent'];
                        $status= $_POST['status'];

                        if(!empty($title) && !empty($link) && !empty($position) && !empty($order_by) && !empty($status)){

                            if(addMenu($title,$link,$position,$order_by,$parent,$status)){
                                $_SESSION['success'] ="Menu muvaffaqiyatli qo'shildi!";
                                header("Location:/admin?controller=menu");
                            }else{
                                $_SESSION['error'] = "Xatolik yuz berdi!";
                            }
                        }
                    }
                    require_once  ADMIN_VIEW . '/menu_add.php';
                break;
                case 'menu_edit':
                    $idMenu = $_GET['id'];
                    if(!empty($idMenu)){
                        $menuData = getMenuItem($idMenu);

                        if(!empty($menuData)){

                            if(!empty($_POST)){
                                $id = $_GET['id'];
                                $title = $_POST['title'];
                                $link = $_POST['link'];
                                $position = $_POST['position'];
                                $order_by = $_POST['order_by'];
                                $parent = $_POST['parent'];
                                $status= $_POST['status'];

                                if(editMenu($id,$title,$link,$position,$order_by,$parent,$status)){
                                    $_SESSION['success'] ="Menu muvaffaqiyatli tahrirlandi!";
                                    header("Location:/admin?controller=menu");
                                }else{
                                    $_SESSION['error'] = "Xatolik yuz berdi!";
                                }

                            }

                            require_once ADMIN_VIEW . '/menu_add.php';
                        }else{
                            $_SESSION['error'] = "$idMenu - qiymatli ID topilmadi!";
                            require_once ADMIN_VIEW . '/404.php';
                        }
                    }else{
                        $_SESSION['error'] = "Majburiy parametr ID kiritilmadi!";
                        require_once ADMIN_VIEW . '/404.php';
                    }

                break;
                case 'menu_delete':
                    $menuId = $_GET['id'];
                    if(!empty($menuId)){
                        deleteMenu($menuId);
                        header("Location:/admin?controller=menu");
                    }else{
                        require_once ADMIN_VIEW . '/404.php';
                    }
                break;
                ##################### MENU CRUD END ###################

                ##################### QUOTE CRUD   ####################
                case 'quote':
                    $quotes = getQuote();
                    require_once ADMIN_VIEW . '/quote.php';
                break;
                case 'quote_add':
                    if(!empty($_POST)){
                        $author = $_POST['name'];
                        $status = $_POST['status'];
                        $quote = $_POST['quote'];

                        if(!empty($author) && !empty($status) && !empty($quote)){
                           if(addQuote($quote,$author,$status)){
                               $_SESSION['success'] = "Ma'lumot muvaffaqiyatli qo'shildi!";
                               header("Location:/admin?controller=quote");
                           }else{
                               $_SESSION['error'] = "Ma'lumot qo'shishda xatolik sodir bo'ldi";
                           }

                        }
                    }
                    require_once ADMIN_VIEW . '/quote_add.php';
                break;
                case 'quote_edit':
                    $quoteId = $_GET['id'];
                    if(!empty($quoteId)){
                      $quoteItem = getQuoteItem($quoteId);

                      if(!empty($quoteItem)){

                          $status = $_POST['status'];
                          $author = $_POST['name'];
                          $quote = $_POST['quote'];
                          $id = $_GET['id'];
                          if(!empty($status) && !empty($author) && !empty($quote)){
                              if(editQuote($id,$quote,$author,$status)){
                                  $_SESSION['success'] ="Menu muvaffaqiyatli qo'shildi!";
                                  header("Location:/admin?controller=quote");
                              }else{
                                  $_SESSION['error'] = "Xatolik yuz berdi!";
                              }

                          }
                          require_once ADMIN_VIEW . '/quote_add.php';

                      }else{
                          $_SESSION['error'] = "$quoteId qiymatli ID topilmadi!";
                          require_once ADMIN_VIEW . '/404.php';
                      }
                    }else{
                        $_SESSION['error'] = "Majbuiy parametr ID kiritilmadi!";
                        require_once ADMIN_VIEW . '/404.php';
                    }
                break;
                case'quote_delete':

                    $quoteId = $_GET['id'];
                    if(!empty($quoteId)){
                        deleteQuote($quoteId);
                        header("Location:/admin?controller=quote");
                    }else{
                        require_once ADMIN_VIEW . '/404.php';
                    }
                break;
                ##################### QUOTE CRUD END  ###################

                ###################### SOCIAL CRUD######## ##############
                case 'social_links':
                    $socialLinks = getallSocial();
                    require_once  ADMIN_VIEW . '/social_links.php';
                break;
                case  'social_add':
                    if(!empty($_POST)){
                        $link = $_POST['link'];
                        $class= $_POST['class'];
                        $status = $_POST['status'];
                        $order_by = $_POST['order_by'];

                        if(!empty($link) && !empty($class) && !empty($status) && !empty($order_by)){
                           if(addSocial($link,$class,$order_by,$status)){
                               $_SESSION['success'] = "Ijtimoiy Tarmoq muvaffaqiyatli qo'shildi!";
                               header("Location:/admin?controller=social_links");
                           }else{
                               $_SESSION['error'] = "Xatolik sodir bo'ldi";
                           }
                        }
                    }

                    require_once ADMIN_VIEW . '/social_add.php';
                break;
                 case 'social_edit':
                    $socialId = $_GET['id'];
                    if(!empty($socialId)){
                        $updateLink = updateLink($socialId);

                        if(!empty($updateLink)){
                            $idSocial = $_GET['id'];
                            $link = $_POST['link'];
                            $class = $_POST['class'];
                            $status = $_POST['status'];
                            $order_by = $_POST['order_by'];

                            if(!empty($link) && !empty($class) && !empty($status) && !empty($order_by)){
                                if(editSocial($idSocial,$link,$class,$status,$order_by)){
                                    $_SESSION['success'] ="Ijtimoiy Tarmoq muvaffaqiyatli tahrirlandi!";
                                    header("Location:/admin?controller=social_links");
                                }else{
                                    echo 1;die;
                                }
                            }

                            require_once ADMIN_VIEW . '/social_add.php';
                        }else{
                            $_SESSION['error'] = "$socialId qiymatli ID topilmadi!";
                            require_once ADMIN_VIEW . '/404.php';
                        }
                    }else{
                        $_SESSION['error'] = "Majburiy parametr ID kiritilmadi!";
                        require_once ADMIN_VIEW . '/404.php';
                    }

                break;
                case 'social_delete':
                    $newsId = $_GET['id'];
                    if(!empty($newsId)){
                        deleteSocial($newsId);
                        header("Location:/admin?controller=social_links");
                    }else{
                        require_once ADMIN_VIEW . '/404.php';
                    }
                break;

                ###################### SOCIAL CRUD END###################

                ######################NEWS CRUD##########################
                case 'news_category':
                    $categories = getAllNewsCategories();
                    require_once ADMIN_VIEW . '/book_category.php';
                break;
                case 'news_category_add':

                    if(!empty($_POST)){
                        $title = $_POST['title'];
                        $status = $_POST['status-news'];

                        if($status == 'on'){
                            $status = 1;
                        }

                        if(!empty($title) && !empty($status)){
                            if(addNewsCategory($title,$status)){
                                $_SESSION['success'] = "Yangilik Categoriyasi muvaffaqiyatli qo'shildi";
                                header("Location:/admin?controller=news_category");
                            }else{
                                $_SESSION['error'] = "Xatolik yuz berdi";
                            }
                        }
                    }



                    require_once ADMIN_VIEW . '/book_category_add.php';
                break;
                case 'news_category_edit':
                    $categoryId = $_GET['id'];
                    if(!empty($categoryId)){
                       $updatecategoryItem = updateCategory($categoryId);

                       if(!empty($updatecategoryItem)){

                           if(!empty($_POST)) {
                               $idCategory = $_GET['id'];
                               $title = $_POST['title'];
                               $status = $_POST['status-news'];

                               if ($status == 'on') {
                                   $status = 1;
                               }
                               if(!empty($title) && $status){
                                   if(editNewsCategory($idCategory,$title,$status)){
                                       $_SESSION['success'] = "Yangilik Categoriyasi muvafaqqiyatli tahrirlandi";
                                        header("Location:/admin?controller=news_category");
                                   }else{
                                       $_SESSION['error'] = "Yangilik Categoriyasini qo'shishda xatolik sodir bo'ldi";
                                   }
                               }
                           }
                           require_once ADMIN_VIEW . '/book_category_add.php';

                       }else{
                           $_SESSION['error'] = "$categoryId qiymatli ID topilmadi";
                           require_once ADMIN_VIEW . '/404.php';
                       }
                    }else{
                        $_SESSION['error'] = "Majburiy parametr ID kiritilmadi";
                        require_once ADMIN_VIEW . '/404.php';
                    }


                break;
                case 'news_category_delete':
                    $delId = $_GET['id'];
                    if(!empty($delId)){

                        if(deleteNewsCategory($delId)){
                            header("Location:/admin?controller=news_category");
                            $_SESSION['success'] = "Yangilik Categoriyasi muvaffaqiyatli o'chirildi!";
                       }else{
                            $_SESSION['error'] ="Yangilik Categoriyasini o'chirishda xatolik sodir bo'ldi!";
                        }
                    }else{
                        $_SESSION['error'] ="Majburiy parametr ID kiritilmadi!";
                        require_once ADMIN_VIEW . '/404.php';
                    }

                break;
                ####################### NEWS CRUD ####################
                case 'book':
                   $news = getAllNews();
                    require_once ADMIN_VIEW . '/book.php';
                break;
                case 'book_add':
                    $getAllCategories = getAllNewsCategories();

                    if(!empty($_POST)){
//                        debug($_FILES);die;

                        $title = $_POST['title'];
                        $description = $_POST['description'];
                        $created_date = date('Y-m-d H:i:s',strtotime($_POST['created_date']));
                        $updated_date =  date('Y-m-d H:i:s');
                        $body = $_POST['body'];
                        $category= $_POST['category_id'];
                        $seen_count = $_POST['seen_count'];
                        if($_POST['status-news'] == 'on'){
                            $status = 1;
                        }else{
                            $status = 0;
                        }
                        if($_POST['actual'] == 'on'){
                            $actual = 1;
                        }else{
                            $actual = 0;
                        }

                        if(!empty($title) && !empty($description) && !empty($created_date) && !empty($body) && !empty($category) && !empty($seen_count)){
                            if($idNews = addNews($title,$description,$created_date,$updated_date,$body,$category,$seen_count,$status,$actual)){

                                if(!empty($_FILES)){
                                    if($imageSrc = saveImage($idNews,'news',$_FILES['image'])){
                                        updateNewsImage($idNews,$imageSrc);
                                    }
                                    if($fileSrc = saveFiles($idNews,'files',$_FILES['files'])){
                                        updateNewFile($idNews,$fileSrc);
                                    }
                                }

                                $_SESSION['success'] = "Yangilik muvaffaqiyatli qo'shildi";
                                header("Location:/admin?controller=book");
                            }else{
                                $_SESSION['error'] = "Yangilikni qo'shishda xatolik sodir boldi";
                            }
                        }
                    }

                    require_once ADMIN_VIEW . '/book_add.php';
                break;
                case 'book_edit':
                    $newsId = $_GET['id'];
                    if(!empty($newsId)){
                        $newsItem = NewsItem($newsId);
                        $getAllCategories = getAllNewsCategories();

                        if(!empty($newsItem)){
                            $oldImage = $_POST['image'];
                           if(!empty($_POST)){

                               $updateNewsId = $_GET['id'];
                               $title = $_POST['title'];
                               $description = $_POST['description'];
                               $created_date = date('Y-m-d H:i:s',strtotime($_POST['created_date']));
                               $updated_date =  date('Y-m-d H:i:s');
                               $body = $_POST['body'];
                               $category= $_POST['category_id'];
                               $seen_count = $_POST['seen_count'];
                               if($_POST['status-news'] == 'on'){
                                   $status = 1;
                               }else{
                                   $status = 0;
                               }
                               if($_POST['actual'] == 'on'){
                                   $actual = 1;
                               }else{
                                   $actual = 0;
                               }

                               if(!empty($title) && !empty($description) && !empty($created_date) && !empty($body) && !empty($category) && !empty($seen_count)){

                                   if(updateNews($updateNewsId,$title,$description,$created_date,$updated_date,$body,$category,$seen_count,$status,$actual)){

                                       if(!empty($_FILES)){
                                           if($imageSrc = saveImage($newsId,'news',$_FILES['image'])){

                                               if(updateNewsImage($newsId,$imageSrc)){
                                                   deleteIOldImage($newsId,'news',$oldImage);
                                               }

                                           }

                                       }

                                       $_SESSION['success'] = "Yangilik muvaffaqiyatli tahrirlandi!";
                                      header("Location:/admin?controller=book");
                                  }else{
                                      $_SESSION['error'] = "Yangilikni tahrirlashda xatolik yuz berdi!";
                                   }
                               }

                           }

                            require_once ADMIN_VIEW . '/book_add.php';
                        }else{
                            $_SESSION['error'] = "$newsId qiymatli ID topilmadi";
                            require_once ADMIN_VIEW . '/404.php';
                        }
                    }else{
                        $_SESSION['error'] = "Majburiy parametr ID kiritilmadi";
                        require_once ADMIN_VIEW . '/404.php';
                    }

                break;
                case 'book_delete':
                    $newsId = $_GET['id'];
                    if(!empty($newsId)){
                        $newsItem = NewsItem($newsId);
                        if(!empty($newsItem)){
                            $oldImage = $newsItem['image'];
                        }
                        if(deleteNews($newsId)){
                            deleteIOldImage($newsId,'news',$oldImage);
                            $_SESSION['success'] = "Yangilik muvaffaqiyatli o'chirildi!";
                            header("Location:/admin?controller=book");
                        }
                    }else{
                        $_SESSION['error'] = "Majburiy paramete ID kiritilmadi";
                    }
                
                break;
                ####################### NEWS CRUD END####################
                case 'user':
                    $getAllUsers = getAllUsers();
                    require_once ADMIN_VIEW . '/user.php';

                break;
                case 'user_add':
                    if(!empty($_POST)){
//                        debug($_POST);die;
//                        debug($_FILES);die;
                        $login = $_POST['login'];
                        $email = $_POST['email'];
                        $password =$_POST['password'];
                        $status = $_POST['status'];
                        if($status == 'on'){
                            $status = 1;
                        }else{
                            $status = 0;
                        }

                        if(!empty($login) && !empty($email) && !empty($password)){
                            $password = sha1($password);
                            if($userId = userAdd($login,$email,$password,$status)){

                                if(!empty($_FILES)){
                                    $avatarSrc = saveImage($userId,'user',$_FILES['avatar']);
                                    updateUserImage($userId,$avatarSrc);
                                }

                                $_SESSION['success'] = "Foydalanuvchi muvaffaqiyatli qo'shildi";
                                header("Location:/admin?controller=user");
                            }else{
                                $_SESSION['error'] = "Foydalanuvchi qo'shishda xatolik yuz berdi";
                            }
                        }


                    }
                    require_once ADMIN_VIEW . '/user_add.php';

                break;
                case 'user_edit':
                    $userId = $_GET['id'];
                    if(!empty($userId)){
                        $userItem = userItem($userId);
                        $oldAvatar = $userItem['avatar'];
                        if(!empty($userItem)){

                            if(!empty($_POST)){
//                                debug($oldAvatar);die;
                                $login = $_POST['login'];
                                $email = $_POST['email'];
                                $password = $_POST['password'];
                                $status = $_POST['status-news'];
                                if($status == 'on'){
                                    $status = 1;
                                }else{
                                    $status = 0;
                                }


                                if(!empty($login) && !empty($email)){

                                        if(updateUser($userId,$login,$email,$password,$status)){

                                            if(!empty($_FILES)){

                                                $avatarSrc = saveImage($userId,'user',$_FILES['avatar']);
                                                updateUserImage($userId,$avatarSrc);
                                                deleteIOldImage($userId,'user',$oldAvatar);
                                            }
                                        $_SESSION['success'] = "Foydalanuvchi ma'lumotlari muvaffaqiyatli tahrirlandi!";
                                        header("Location:/admin?controller=user");
                                    }else{
                                        $_SESSION['error'] = "Foydalanuvchi a'lumotlarini tahrirlashda xatolik yuz berdi!";
                                    }
                                }
                            }

                            require_once ADMIN_VIEW . "/user_add.php";
                        }else{
                            $_SESSION['error'] = "$userId qiymatli ID topimadi";
                            require_once ADMIN_VIEW . '/404.php';
                        }
                    }else{
                        $_SESSION['error'] = "Majburiy parametr ID kiritilmadi!";
                        require_once ADMIN_VIEW . '/404.php';
                    }
                break;




                default: require_once  ADMIN_VIEW . '/404.php';
            }

        }else{
            require_once  ADMIN_VIEW . '/index.php';
        }

}else{
    if(!empty($_POST)){
        $login = $_POST['login'];
        $password = $_POST['password'];

        if(!empty($login) && !empty($password)){
            if($userLogin = userLogin($login,$password)){
                $_SESSION['user'] = $userLogin;
                header("refresh:0");
            }else{
                $_SESSION['error'] = 'Login yoki parolni xato kiritdingiz!';
            }

        }else{
            $_SESSION['error'] = 'Login yoki parolni kiritmadingiz!';
        }

    }
    require_once  ADMIN_VIEW . '/login.php';
}

