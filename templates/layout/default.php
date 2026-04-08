<?php
$user = $this->request->getSession()->read('Auth');
$appDescription = 'Hệ thống Quản lý Lớp học';
?>
<!DOCTYPE html>
<html lang="vi"> <head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $appDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css(['normalize.min', 'milligram.min', 'fonts', 'cake']) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <nav class="top-nav">
        <div class="top-nav-title">
            <a href="<?= $this->Url->build('/') ?>"><span>Class management</span></a>
        </div>
        
        <div class="top-nav-links">
            <?php if ($user): ?>
                <span>Xin chào, <?= h($user->username) ?></span> | 
                <a href="<?= $this->Url->build('/teachers/logout') ?>">Đăng xuất</a>
            <?php else: ?>
                <a href="<?= $this->Url->build('/teachers/login') ?>">Đăng nhập</a>
            <?php endif; ?>
        </div>
    </nav>

    <main class="main">
        <div class="container">
            <?= $this->Flash->render() ?>
            
            <?php if ($user): // Chỉ hiện menu khi đã đăng nhập ?>
            <div class="row">
                <div class="column column-25">
                    <div class="admin-sidebar" style="background: #f4f6f8; padding: 15px; border-radius: 5px;">
                        <h4 style="font-size: 1.2rem; border-bottom: 1px solid #ddd; padding-bottom: 5px;">Menu Quản lý</h4>
                        <ul style="list-style-type: none; padding: 0; margin: 0;">
                            <li style="margin-bottom: 10px;">
                                <a href="<?= $this->Url->build('/teachers') ?>">👨‍🏫 Quản lý Giáo viên (Admin)</a>
                            </li>
                            <li style="margin-bottom: 10px;">
                                <a href="<?= $this->Url->build('/school-classes') ?>">🏫 Quản lý Lớp học</a>
                            </li>
                            <li style="margin-bottom: 10px;">
                                <a href="<?= $this->Url->build('/students') ?>">🎓 Quản lý Học sinh</a>
                            </li>
                        </ul>
                    </div>
                </div>
                
                <div class="column column-75">
                    <?= $this->fetch('content') ?>
                </div>
            </div>
            <?php else: // Nếu chưa đăng nhập thì chỉ hiện nội dung form login ở giữa ?>
                <?= $this->fetch('content') ?>
            <?php endif; ?>
            </div>
    </main>
    
    <footer>
    </footer>
</body>
</html>