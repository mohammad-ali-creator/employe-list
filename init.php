<?php
/**
 * Plugin Name: Employe List
 * Author: mohammad
 * Description: Easy to use employe list
 */


function em_basic(){
    register_post_type('employe', array(
        'labels' => array(
            'name' => 'Employe',
            'add_new' => 'Add employe'
        ),
        'public' => true,
        'supports' => array('editor', 'title', 'thumbnail')
    ));
}


add_action('init', 'em_basic');

add_action('add_meta_boxes', 'em_metaboxes');

function em_metaboxes() {
    add_meta_box('em_metabox', 'Additional Info', 'em_callback', 'Employe');
}

function em_callback(){
    
    $fa = get_post_meta(get_the_ID(), '_em_father', true);
    $mo = get_post_meta(get_the_ID(), '_em_mother', true);
    $degi = get_post_meta(get_the_ID(), '_em_degi', true);
    $skill = get_post_meta(get_the_ID(), '_em_skill', true);
    $ssc = get_post_meta(get_the_ID(), '_em_ssc', true);

    ?>
    <form action="">
    <p>
    <label for="father" >Father: </label>
    <input type="text" name="father" id="mother" value="<?php echo $fa; ?>" required>
    </p>

    <p>
    <label for="mother">Mother: </label>
    <input type="text" name="mother" id="mother" value="<?php echo $mo; ?>" required>
    </p>
    <p>
    <label for="degi">Designation: </label>
    <input type="text" name="degi" id="degi" value="<?php echo $degi; ?>" required>
    </p>
    <p>
    <label for="skill">Skills: </label>
    <input type="text" name="skill" id="skill" value="<?php echo $skill; ?>" required>
    </p>
    <p>
    <label for="ssc">SSC Year: </label>
    <input type="text" name="ssc" id="ssc" value="<?php echo $ssc; ?>" required>
    </p>
    </form>
    <?php
}


add_action('save_post', 'em_save');

function em_save($id){
    $fa = isset($_REQUEST['father']) ? $_REQUEST['father'] : '';
    $mo = isset($_REQUEST['mother']) ? $_REQUEST['mother'] : '';
    $degi = isset($_REQUEST['degi']) ? $_REQUEST['degi'] : '';
    $skill = isset($_REQUEST['skill']) ? $_REQUEST['skill'] : '';
    $ssc = isset($_REQUEST['ssc']) ? $_REQUEST['ssc'] : '';

    if($fa != ''){
        update_post_meta($id, '_em_father', $fa);
        update_post_meta($id, '_em_mother', $mo);
        update_post_meta($id, '_em_degi', $degi);
        update_post_meta($id, '_em_skill', $skill);
        update_post_meta($id, '_em_ssc', $ssc);
    }
}

