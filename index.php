<?php
$data = json_decode(file_get_contents('data.json'), false);
if (empty($data)) {
    exit('JSON error');
}
?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
	<link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic|Open+Sans:300,400,500,700|Waiting+for+the+Sunrise|Shadows+Into+Light' rel='stylesheet' type='text/css'>
    <link href="main.css" rel="stylesheet" />
</head>
<body>

<div class="wrapper clearfix">
  <div class="left">

    <div class="name-hero">
	  <div class="me-img"></div>

      <div class="name-text">
		<h1>
			<?= explode(' ', $data->info->name)[0]; ?>
			<em>
			<?= explode(' ', $data->info->name)[1] ?? ''; ?>
			</em>
		</h1>
        <p><?=$data->info->address; ?></p>
        <p><?=$data->info->email; ?></p>
        <p><?=$data->info->phone; ?></p>

		<br />
		<br />
		<ul class="links">
		<? foreach($data->links as $link): ?>
			<li>
				<a href="<?=$link;?>" target="_blank">
					<?=str_replace(['https://', 'http://', 'www.'], '', $link);?>
				</a>
			</li>
		<? endforeach ?>
		</ul>
	  </div>
    </div>

  </div>
  <div class="right">

    <div class="inner">
      <section>
		<? foreach (array_reverse($data->projects) as $proj): ?>
			<p>
				<h1><?=$proj->name; ?></h1>
				<span class="dates minor"><?=$proj->dates;?></span>
				<span class="location minor"><?=$proj->place;?></span>
				</p>
			<p>
				<?=$proj->descr; ?>
			</p>
		<? endforeach ?>
	  </section>
      <section>
		<ul class="skill-set">
		  <? foreach ($data->skills as $skill): ?>
		  <li> <?=$skill; ?></li>
		  <? endforeach ?>
        </ul>
      </section>
      <section>
		<? foreach ($data->education as $edu): ?>
		<p> <?=$edu->name; ?> | <em> <?=$edu->descr; ?> <?=$edu->dates; ?> </em>
		<? endforeach ?>
      </section>
      <section>
		<ul class="skill-set">
		  <? foreach ($data->hobbies as $hobby): ?>
		  <li> <?=$hobby; ?></li>
		  <? endforeach ?>
        </ul>
      </section>
    </div>

  </div>

</div>
