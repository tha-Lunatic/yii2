 <?
                                if (Yii::$app->user->isGuest) {
                                    unset($_COOKIE['guestcart']);
                                    setcookie('guestcart', var_export($cart, true), 0, '/');
                                } else {
                                    if ($_COOKIE['guestcart']) {
                                        eval('$cart = ' . $_COOKIE['guestcart'] . ';');
                                        if ($cart) {
                                            $goods = [];
                                           if(isset($files) && is_array($files)) foreach ($cart['cart'] as $value=>$item) {
                                                $catalogGood = \app\models\CatalogGood::find()->where(['id' => $value])->one();
                                                $goods[] = $catalogGood;
                                            }
                                        }
                                        setcookie('guestcart', null, -1, '/');
                                    }
                                }
                                ?>
                                <?php if (is_array($goods) && $goods) { ?>
