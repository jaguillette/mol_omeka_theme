<?php echo head(array('title' => metadata('item', array('Dublin Core', 'Title')),'bodyclass' => 'item show')); ?>

<h1><?php echo metadata('item', array('Dublin Core', 'Title')); ?></h1>

<div>
    <h2><?php echo(metadata($item, array("MOL Metadata", "Object Title"))) ?></h2>
    <p><strong>Biography Author(s): </strong><?php echo(implode(", ", metadata($item, array("MOL Metadata", "Author(s) of the biographies"), array("all"=>true)))); ?></p>
</div>

<div id="interrogation">
    <div id="questions">
    <?php 
        $questions=array(
            'What is it?',
            'Why was it made?',
            'Who made it?',
            'Where was it produced?',
            'Where did it go?',
            'When was it made?',
            'How was it used?',
            'How was it made?');
        shuffle($questions);
        foreach ($questions as $question): ?>
        <div class="question">
            <h2><?php echo($question); ?></h2>
            <div class="answer">
                <h3>&lt;- <?php echo($question); ?></h3>
                <?php echo( metadata($item, array('MOL Metadata',$question)) ); ?>
            </div>
        </div>
        <?php endforeach ?>
    </div>
    <div id="interrogation-media">
    <?php if ($model = metadata($item, array('MOL Metadata','3D Model'))): ?>
        <?php echo($model); ?>
    <?php else: ?>
        <?php echo files_for_item(array('imageSize' => 'fullsize')); ?>
    <?php endif; ?>
    </div>
</div>

<div>
    <p><strong>Material Composition: </strong><?php echo(implode(", ", metadata($item, array("MOL Metadata", "Material Composition"), array("all"=>true)))); ?></p>
    <p><strong>Functional Category: </strong><?php echo(implode(", ", metadata($item, array("MOL Metadata", "Functional Category"), array("all"=>true)))); ?></p>
    <p><strong>Rights: </strong><?php echo(implode("<br/>", metadata($item, array("MOL Metadata", "Rights"), array("all"=>true)))); ?></p>
    <p><strong>Identifier: </strong><?php echo(implode("<br/>", metadata($item, array("MOL Metadata", "Identifier"), array("all"=>true)))); ?></p>
</div>

<!-- If the item belongs to a collection, the following creates a link to that collection. -->
<?php if (metadata('item', 'Collection Name')): ?>
<div id="collection" class="element">
    <h3><?php echo __('Collection'); ?></h3>
    <div class="element-text"><p><?php echo link_to_collection_for_item(); ?></p></div>
</div>
<?php endif; ?>

<!-- The following prints a list of all tags associated with the item -->
<?php if (metadata('item', 'has tags')): ?>
<div id="item-tags" class="element">
    <h3><?php echo __('Tags'); ?></h3>
    <div class="element-text"><?php echo tag_string('item'); ?></div>
</div>
<?php endif;?>

<!-- The following prints a citation for this item. -->
<div id="item-citation" class="element">
    <h3><?php echo __('Citation'); ?></h3>
    <div class="element-text"><?php echo metadata('item', 'citation', array('no_escape' => true)); ?></div>
</div>

<?php fire_plugin_hook('public_items_show', array('view' => $this, 'item' => $item)); ?>

<nav>
<ul class="item-pagination navigation">
    <li id="previous-item" class="previous"><?php echo link_to_previous_item_show(); ?></li>
    <li id="next-item" class="next"><?php echo link_to_next_item_show(); ?></li>
</ul>
</nav>

<?php echo foot(); ?>
