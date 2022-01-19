<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/homev2.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <script type="application/javascript" src="<?php echo base_url() ?>assets/javascript/currencyv2.js" async></script>
    <title>Dashboard</title>
</head>

<body>
    <form method="POST">
        <input type="hidden" name="logout" value="true">
        <input type="submit" value="log-out">
    </form>

    <form method="POST">
        <input type="hidden" name="refresh" value="true">
        <input type="submit" value="refresh-test">
    </form>
    <main>
        <section class="currencies">
            <div class="curreny widget" id="eth-class">
                <div style="color:#8A92B2" class="currency-name">
                    <h1>ETH</h1>
                    <img src="https://assets.coingecko.com/coins/images/279/large/ethereum.png?1595348880" alt="">
                </div>
                <div class="currency-value">
                    <h1 id="eth"></h1>
                </div>
            </div>

            <div style="color:#009CE8" class="curreny widget" id="axs-class">
                <div class="currency-name">
                    <h1>AXS</h1>
                    <img src="https://assets.coingecko.com/coins/images/13029/large/axie_infinity_logo.png?1604471082" alt="">
                </div>
                <div class="currency-value">
                    <h1 id="axs"></h1>
                </div>
            </div>

            <div style="color:#FFAFBC" class="curreny widget" id="slp-class">
                <div class="currency-name">
                    <h1>SLP</h1>
                    <img src="https://assets.coingecko.com/coins/images/10366/large/SLP.png?1578640057" alt="">
                </div>
                <div class="currency-value">
                    <h1 id="slp">123,123</h1>
                </div>
            </div>
        </section>

        <section class="information">
            <div class="top-scholar widget">
                <!-- TOP SCHOLARS -->
            </div>
            <div class="table-container widget">
                <div class="heading-row">
                    <div class="heading-col">
                        <h1>Name</h1>
                    </div>
                    <div class="heading-col">
                        <h1>Today</h1>
                    </div>
                    <div class="heading-col">
                        <h1>Average</h1>
                    </div>
                    <div class="heading-col">
                        <h1>Adventure</h1>
                    </div>
                    <div class="heading-col">
                        <h1>Elo</h1>
                    </div>
                    <div class="heading-col">
                        <h1>Next Claim</h1>
                    </div>
                </div>

                <div class="rows">
                    <?php
                    $index = 1;
                    foreach ($scholars_status as $scholar) : ?>
                        <div class="row-container">
                            <div class="row-visible">
                                <div class="row-col">
                                    <h1><?php echo $scholar['leaderboard']['name'] ?></h1>
                                </div>
                                <div class="row-col">
                                    <?php if ($scholar['slp']['todaySoFar'] < $scholars[$index - 1]['quota']) : ?>
                                        <h1 style="color:#D82847">
                                        <?php elseif ($scholar['slp']['todaySoFar'] >= $scholars[$index - 1]['quota']) : ?>
                                            <h1 style="color:#2DD45C">
                                            <?php endif; ?>
                                            <?php echo $scholar['slp']['todaySoFar'] ?><br>
                                            <span style="font-size: .6rem; color: #ebebeb" class="quota"><?php echo $scholars[$index - 1]['quota'] ?> Daily quota</span>
                                            </h1>
                                </div>
                                <div class="row-col">
                                    <h1><?php echo $scholar['slp']['average'] ?></h1>
                                </div>
                                <div class="row-col">
                                    <h1><?php echo $scholar['adventure']['gained_slp'] ?>/<?php echo $scholar['adventure']['max_slp'] ?></h1>
                                </div>
                                <div class="row-col">
                                    <h1><?php echo $scholar['leaderboard']['elo'] ?> <i class="bi bi-trophy-fill" style="color:gold"></i></h1>
                                </div>
                                <div class="row-col">
                                    <h1>
                                        <?php
                                        $time_today = date_create(date('Y-m-d', time()));
                                        $time_last_claimed = date_create(date('Y-m-d', $scholar['slp']['lastClaimedItemAt']));
                                        $difference = (array)date_diff($time_today, $time_last_claimed, true);
                                        $time = 15 - $difference['d'];
                                        ?>
                                        <?php if ($time > 0) : ?>
                                            <span style="color:#D82847">
                                                <?php echo "In " . $time . " day(s)"; ?>
                                            </span>
                                        <?php else : ?>
                                            <span style="color:#2DD45C">
                                                <?php echo "Claim available"; ?>
                                            </span>
                                        <?php endif; ?>
                                        <br>
                                        <span style="font-size: .6rem;">
                                            <?php
                                            echo "Last claimed " . $difference['d'] . " day(s) ago.";
                                            ?>
                                        </span>
                                    </h1>
                                </div>
                            </div>

                            <div class="row-hidden">
                                <div class="scholar-profile">
                                    <div class="profile-picture">
                                        <div class="image-border">
                                            <img class="image" src="<?php echo $scholars[$index - 1]['image_location'] ?>" alt="">
                                        </div>
                                    </div>
                                    <div class="profile-information">
                                        <button class="settings-button"><i class="bi bi-gear-fill"></i></i></button>
                                        <div class="actions">
                                            <input type="hidden" class="hidden-input" value="<?php echo $scholars[$index - 1]['scholar_id'] ?>">
                                            <button class="edit">Edit <i class="bi bi-pencil-square"></i></button>
                                            <button class="delete">Delete <i class="bi bi-trash"></i></button>
                                        </div>
                                        <p>Name</p>
                                        <h1 class="name"><?php echo $scholars[$index - 1]['name'] ?></h1>
                                        <p>Email</p>
                                        <h1 class="email"><?php echo $scholars[$index - 1]['email'] ?></h1>
                                        <p>Contact</p>
                                        <h1 class="contact"><?php echo $scholars[$index - 1]['contact'] ?></h1>
                                        <p>Address</p>
                                        <p class="address"><?php echo $scholars[$index - 1]['address'] ?></p>
                                    </div>
                                </div>

                                <div class="chart-container">
                                    <canvas class="slp-chart" width="300px" height="300px"></canvas>
                                </div>
                            </div>
                        </div>
                        <?php $index++; ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
        <section class="modal">
            <div class="edit-modal">
                <button id="close-edit">X</button>
                <form method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="scholar_id" value="" id="scholar_id">
                    <div class="left-input">
                        <h1>Edit Scholar</h1>
                        <div class="img-container">
                            <img src="" alt="" id = "image">
                            <div class="select-picture">
                                <i class="bi bi-camera"></i>
                                <input type="file" name="scholar_profile" accept="image/*" id="image-picker">
                            </div>
                        </div>
                        <div class="edit-input">
                            <h1>Name</h1>
                            <input type="text" name="name" placeholder="Full name" autocomplete="off" value="" id="name">
                        </div>
                        <div class="edit-input">
                            <h1>Email</h1>
                            <input type="text" name="email" placeholder="email" autocomplete="off" value="" id="email">
                        </div>
                        <div class="edit-input">
                            <h1>Contact</h1>
                            <input type="text" name="contact" placeholder="Contact" autocomplete="off" value="" id="contact">
                        </div>
                    </div>
                    <div class="right-input">
                        <div class="edit-input">
                            <h1>Daily Quota</h1>
                            <input type="text" name="quota" placeholder="Daily quota" autocomplete="off" value="" id="quota">
                        </div>
                        <div class="edit-input">
                            <h1>Share</h1>
                            <input type="text" name="share" placeholder="Share" autocomplete="off" value="" id="share">
                        </div>
                        <div class="edit-input">
                            <h1>Address</h1>
                            <textarea name="address" placeholder="Address" value="" id="address"></textarea>
                        </div>
                        <div class="valid-id-btn">
                            <p>Valid ID <i class="bi bi-person-badge-fill"></i></p>
                            <input type="file" name="valid_id" accept="image/*">
                        </div>
                        <input type="submit" name="update" value="UPDATE" class="update">
                    </div>
                </form>
            </div>

        </section>
    </main>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js" integrity="sha512-TW5s0IT/IppJtu76UbysrBH9Hy/5X41OTAbQuffZFU6lQ1rdcLHzpU5BzVvr/YFykoiMYZVWlr/PX1mDcfM9Qg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="application/javascript">
        <?php
        $slp_y = array();
        $slp_x = array();
        $tmp = array();

        for ($i = 0; $i < $index - 1; $i++) {
            $lst = json_decode($scholars[$i]['slp_chart'], true);
            for ($j = 0; $j < 7; $j++) {
                array_push($tmp, $lst[$j]['slp']);
            }
            array_push($slp_y, $tmp);
            $tmp = array();
        }

        for ($i = 0; $i < $index - 1; $i++) {
            $lst = json_decode($scholars[$i]['slp_chart'], true);
            for ($j = 0; $j < 7; $j++) {
                array_push($tmp, date('m/d/y', $lst[$j]['time']));
            }
            array_push($slp_x, $tmp);
            $tmp = array();
        }
        ?>

        var slp_y = <?php echo json_encode($slp_y); ?>;
        var slp_x = <?php echo json_encode($slp_x); ?>;
    </script>
    <script src="<?php echo base_url() ?>assets/javascript/scriptv2.js"></script>
    <script src="<?php echo base_url() ?>assets/javascript/chart.js"></script>
</body>

</html>