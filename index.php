<?php
$data = json_decode(file_get_contents("data.json"));
if (empty($data)) {
    die("JSON error");
}

?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Hristo Georgiev</title>
    <link href="css/normalize.css" rel="stylesheet" />
    <link href="css/main.css" rel="stylesheet" />
</head>
<body>
    <div id="container">
        <div id="leftPanel" class="mainPanel">
            <div class="content">
                <h1 class="title">Hristo Georgiev</h1>
                <h3 class="subtitle">Techie</h3>


                <div class="listing">
                    <div class="head">
                        <div class="icon">
                            <img src="img/work.png" alt="" />
                        </div>
                        <h1>Projects</h1>
                        <div class="clean"></div>
                    </div>

                    <div class="clean" style="height: 10px"></div>

                    <?php $projects = $data->projects;
                       $num_projects = count($projects);
                    ?>
                    <?php for ($i=$num_projects-1; $i >= 0; $i--): ?>
                    <?php $proj = $projects[$i]; ?>
                    <div class="item">
                        <div class="timeline <?=$proj->color;?>">
                            <div class="point"></div>
                            <div class="line" style="height: <?=$proj->height;?>px"></div>
                        </div>
                        <div class="data">
                            <div class="name"> <?=$proj->name;?> </div>
                            <div class="meta">
                                <div class="place">
                                    <?=$proj->place;?>
                                </div>
                                <div class="date">
                                    <?=$proj->dates;?>
                                </div>
                                <div class="clean"></div>
                            </div>

                            <div class="descr">
                                <?=$proj->descr;?>
                            </div>
                            <div class="clean"></div>
                        </div>
                        <div class="clean"></div>
                    </div>
                    <?php endfor; ?>

                </div>

                <div class="listing">
                    <div class="head">
                        <div class="icon">
                            <img src="img/edu.png" alt="" />
                        </div>
                        <h1>Education</h1>
                        <div class="clean"></div>
                    </div>

                    <div class="clean" style="height: 10px"></div>

                    <?php foreach ($data->education as $edu): ?>
                    <div class="item">
                        <div class="timeline <?php echo $edu->color;?>">
                            <div class="point"></div>
                            <div class="line" style="height: 80px"></div>
                        </div>
                        <div class="data">
                            <div class="name"> <?=$edu->name;?> </div>
                            <div class="meta">
                                <div class="place">
                                    <?=$edu->place;?>
                                </div>
                                <div class="date">
                                    <?=$edu->dates; ?>
                                </div>
                                <div class="clean"></div>
                            </div>

                            <div class="descr">
                                <?=$edu->descr;?>
                            </div>
                            <div class="clean"></div>
                        </div>
                        <div class="clean"></div>
                    </div>
                    <?php endforeach; ?>

                </div>

                <br /> <br /> <br />
                <div class="listing">
                    <div class="head">
                        <div class="icon">
                            <img src="img/person.png" alt="" />
                        </div>
                        <h1>Personal information</h1>
                        <div class="clean"></div>
                    </div>

                    <div class="clean" style="height: 10px"></div>

                    <?php foreach ($data->personal as $p): ?>
                    <div class="item">
                        <div class="timeline">
                            <div class="point"></div>
                        </div>
                        <div class="data">
                            <div class="name casual"> <?=$p?> </div>
                            <div class="clean"></div>
                        </div>
                        <div class="clean"></div>
                    </div>
                    <?php endforeach; ?>

                </div>

            </div>
        </div>

        </div>
        <div id="rightPanel" class="mainPanel">

            <div id="pic">
                <img src="me.jpg" alt="Hristo Georgiev" />
            </div>
            <div class="infoPanel">
                <div class="head">
                    <div class="icon">
                        <img src="img/contacts.png" alt="" />
                    </div>
                    <div class="title">
                        Contacts
                    </div>
                    <div class="clean"></div>
                </div>
                <div class="content">
                    www.hgeorgiev.com <br />
                    h.georgiev@hotmail.com <br />
                    <br />
                    Sofia, Lozenets, Akatsia 2<br />
                    +359886208872
                </div>
            </div>


            <div class="infoPanel">
                <div class="head">
                    <div class="icon">
                        <img src="img/skills.png" alt="" />
                    </div>
                    <div class="title">
                        Skills
                    </div>
                    <div class="clean"></div>
                </div>
				<div class="content">
					Go <br />
					Kubernetes, Docker, Docker Compose, Docker Swarm <br />
                    <br />
                    NodeJS, ES6, TypeScript, React<br />
					<br />
                    PHP <br />
                    Symfony, Zend Framework, CodeIgniter <br />
                    <br />
					Amazon Web Services, Lambda, DynamoDB, EC2, ElasticBeanstalk, etc. <br />
					<br />
					SQS, Kafka <br />
					<br />
					ElasticSearch <br />
					<br />
					MySQL, MongoDB, Neo4j, SQL Server, SQLite<br />
                    <br />
                    Java <br />
					Dropwizzard <br />
					<br />
                    OSX, Linux, Windows, BSD <br />


                </div>
            </div>

            <div class="infoPanel" style="margin-top: 170px;">
                <div class="head">
                    <div class="icon">
                        <img src="img/lang.png" alt="" />
                    </div>
                    <div class="title">
                        Languages
                    </div>
                    <div class="clean"></div>
                </div>
                <div class="content">
                    <div class="languages">
                        <div class="lang">
                            <div class="name">Bulgarian:</div>
                            <div class="stars">
                                <div class="earned"> * * * * *</div>
                            </div>
                        </div>
                        <div class="lang">
                            <div class="name">English:</div>
                            <div class="stars">
                                <div class="earned"> * * * * *</div>
                            </div>
                        </div>
                        <div class="lang">
                            <div class="name">German:</div>
                            <div class="stars">
                                <div class="earned"> * *</div>
                                <div class="todo"> * * * </div>
                            </div>
                        </div>
                        <div class="lang">
                            <div class="name">Swedish:</div>
                            <div class="stars">
                                <div class="earned"> * </div>
                                <div class="todo"> * * * *</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="infoPanel">
                <div class="content">
                
                <div class="clean"></div>
                </div>
            </div>
        </div>
        <div class="clean"></div>
    </div>

</body>
</html>
