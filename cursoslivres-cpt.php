<?php

/**
 * Plugin Name: Cursos Livres SATC
 * Plugin URI: https://github.com/gmartpad
 * Author: Gabriel Martins Padoin
 * Description: Esse plugin move dados da tabela wb_cursos_livres para o CPT
 * Version: 0.1.0
 * License: GPL2
 * License URL: http://www.gnu.org/licenses/gpl-2.0.txt
 * text-domain: prefix-plugin-name
*/

function create_cursoslivressatc_cpt() {
    
    $labels = array(
        'name' => _x('Cursos Livres SATC', 'Nome Geral do Post Type', 'Cursos Livres SATC'),
        'singular_name' => _x('Curso Livre SATC', 'Nome Singular do Post Type', 'Curso Livre SATC'),
        'menu_name' => _x('Cursos Livres SATC', 'Texto do Menu Administrativo', 'Cursos Livres SATC'),
        'name_admin_bar' => _x('Cursos Livres SATC', 'Adiciona Novo Curso na Barra de Ferramentas', 'Cursos Livres SATC'),
        'archives' => __('Arquivos dos Cursos', 'Cursos Livres SATC'),
        'attributes' => __('Atributos dos Cursos Livres SATC', 'Cursos Livres SATC'),
        'parent_item_colon' => __('Página Pai do Curso Livre SATC:', 'Cursos Livres SATC'),
        'all_items' => __('Todos os Cursos Livres SATC', 'Cursos Livres SATC'),
        'add_new_item' => __('Adicionar um Curso Livre SATC novo', 'Cursos Livres SATC'),
        'add_new' => __('Adicionar novo', 'Cursos Livres SATC'),
        'new_item' => __('Novo Curso Livre SATC', 'Cursos Livres SATC'),
        'edit_item' => __('Editar Curso Livre SATC', 'Cursos Livres SATC'),
        'update_item' => __('Atualizar Curso Livre SATC', 'Cursos Livres SATC'),
        'view_item' => __('Ver Curso Livre SATC', 'Cursos Livres SATC'),
        'view_items' => __('Ver Cursos Livres SATC', 'Cursos Livres SATC'),
        'search_items' => __('Buscar Cursos Livres SATC', 'Cursos Livres SATC'),
        'not_found' => __('Nenhum Curso Livre SATC encontrado', 'Cursos Livres SATC'),
        'not_found_in_trash' => __('Nenhum Curso Livre SATC encontrado no lixo', 'Cursos Livres SATC'),
        'featured_image' => __('Imagem em Destaque', 'Cursos Livres SATC'),
        'set_featured_image' => __('Definir Imagem em Destaque', 'Cursos Livres SATC'),
        'remove_featured_image' => __('Remover Imagem em Destaque', 'Cursos Livres SATC'),
        'use_featured_image' => __('Usar Imagem em Destaque', 'Cursos Livres SATC'),
        'insert_into_item' => __('Inserir no Curso Livre SATC', 'Cursos Livres SATC'),
        'uploaded_to_this_item' => __('Carregar no Curso Livre SATC', 'Cursos Livres SATC'),
        'items_list' => __('Lista de Cursos Livres SATC', 'Cursos Livres SATC'),
        'items_list_navigation' => __('Navegação da Lista de Cursos Livres SATC', 'Cursos Livres SATC'),
        'filter_items_list' => __('Filtrar Lista de Cursos Livres SATC', 'Cursos Livres SATC'),
    );
    $args = array(
        'label' => __('Cursos Livres SATC', 'Cursos Livres SATC'),
        'description' => __('Cursos Livres SATC', 'Cursos Livres SATC'),
        'labels' => $labels,
        'menu_icon' => 'dashicons-admin-tools',
        'supports' => array(‘title’, ‘editor’),
        'taxonomies' => array(),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => true,
        'can_export' => true,
        'has_archive' => true,
        'hierarchical' => false,
        'exclude_from_search' => false,
        'show_in_rest' => true,
        'publicly_queryable' => true,
        'capability_type' => 'post',
    );
    register_post_type('cursos_livres_satc', $args );
} 

add_action('init', 'create_cursoslivressatc_cpt', 0);

function my_admin() {
    add_meta_box(
        'Cursos_livres_satc_meta_box',
        'Informações do Curso Livre SATC',
        'display_Cursos_livres_satc_meta_box',
        'cursos_livres_satc',
        'normal',
        'high'
    );
}
add_action( 'admin_init', 'my_admin' );

function display_Cursos_livres_satc_meta_box(){
    
    ?>
        <table>
            <tr>
                <td style="width: 50%">Id do Curso</td>
                <td><input type="text" size="60" name="cursos_livres_satc" value="<?php echo get_post_meta( get_the_ID(), 'id_curso', true ); ?>" readonly/></td></td>
            </tr>
            <tr>
                <td style="width: 50%">Título</td>
                <td><input type="text" size="60" name="cursos_livres_satc" value="<?php echo get_post_meta( get_the_ID(), 'titulo', true ); ?>" readonly/></td></td>
            </tr>
            <tr>
                <td style="width: 50%">Objetivo</td>
                <td><textarea type="text" cols="60" rows="8" name="cursos_livres_satc" readonly><?php echo get_post_meta( get_the_ID(), 'objetivo', true ); ?></textarea></td></td>
            </tr>
            <tr>
                <td style="width: 50%">Conteúdo</td>
                <td><textarea type="text" cols="60" rows="8" name="cursos_livres_satc" readonly><?php echo get_post_meta( get_the_ID(), 'conteudo_prog', true ); ?></textarea></td></td>
            </tr>
            <tr>
                <td style="width: 50%">Mais Informações</td>
                <td><textarea type="text" cols="60" rows="8" name="cursos_livres_satc" readonly><?php echo get_post_meta( get_the_ID(), 'mais_informacoes', true ); ?></textarea></td></td>
            </tr>
            <tr>
                <td style="width: 50%">Texto Complementar</td>
                <td><textarea type="text" cols="60" rows="8" name="cursos_livres_satc" readonly><?php echo get_post_meta( get_the_ID(), 'texto_complementar', true ); ?></textarea></td></td>
            </tr>
            <tr>
                <td style="width: 50%">Imagem</td>
                <td><input type="text" size="60" name="cursos_livres_satc" value="<?php echo get_post_meta( get_the_ID(), 'imagem', true ); ?>" readonly/></td></td>
            </tr>
            <tr>
                <td style="width: 50%">Id da Turma</td>
                <td><input type="text" size="60" name="cursos_livres_satc" value="<?php echo get_post_meta( get_the_ID(), 'i_turma', true ); ?>" readonly/></td></td>
            </tr>
            <tr>
                <td style="width: 50%">Carga Horária</td>
                <td><input type="text" size="60" name="cursos_livres_satc" value="<?php echo get_post_meta( get_the_ID(), 'carga_horaria', true ); ?>" readonly/></td></td>
            </tr>
            <tr>
                <td style="width: 50%">Data Realização - Início</td>
                <td><input type="text" size="60" name="cursos_livres_satc" value="<?php echo get_post_meta( get_the_ID(), 'dt_realizacao_ini', true ); ?>" readonly/></td></td>
            </tr>
            <tr>
                <td style="width: 50%">Data Realização - Fim</td>
                <td><input type="text" size="60" name="cursos_livres_satc" value="<?php echo get_post_meta( get_the_ID(), 'dt_realizacao_fim', true ); ?>" readonly/></td></td>
            </tr>
            <tr>
                <td style="width: 50%">Id da Área</td>
                <td><input type="text" size="60" name="cursos_livres_satc" value="<?php echo get_post_meta( get_the_ID(), 'i_area', true ); ?>" readonly/></td></td>
            </tr>
            <tr>
                <td style="width: 50%">Modalidade</td>
                <td><input type="text" size="60" name="cursos_livres_satc" value="<?php echo get_post_meta( get_the_ID(), 'modalidade', true ); ?>" readonly/></td></td>
            </tr>
            <tr>
                <td style="width: 50%">Local</td>
                <td><input type="text" size="60" name="cursos_livres_satc" value="<?php echo get_post_meta( get_the_ID(), 'local', true ); ?>" readonly/></td></td>
            </tr>
            <tr>
                <td style="width: 50%">Link do Curso</td>
                <td><input type="text" size="60" name="cursos_livres_satc" value="<?php echo get_post_meta( get_the_ID(), 'link_curso', true ); ?>" readonly/></td></td>
            </tr>
            <tr>
                <td style="width: 50%">Data do Sistema</td>
                <td><input type="text" size="60" name="cursos_livres_satc" value="<?php echo get_post_meta( get_the_ID(), 'dt_sistema', true ); ?>" readonly/></td></td>
            </tr>
            <tr>
                <td style="width: 50%">Chamada Destaque</td>
                <td><input type="text" size="60" name="cursos_livres_satc" value="<?php echo get_post_meta( get_the_ID(), 'chamada_destaque', true ); ?>" readonly/></td></td>
            </tr>
        </table>
    <?php
}


function cpt_check_for_similar_meta_ids() {
	$id_arrays_in_cpt = array();

	$args = array(
		'post_type' => 'cursos_livres_satc',
		'posts_per_page' => -1,
	);

	$loop = new WP_Query($args);
    while( $loop->have_posts() ) {
    	$loop->the_post();
    	$id_arrays_in_cpt[] = get_post_meta( get_the_ID(), 'id_curso', true );
    }

	return $id_arrays_in_cpt;
}

function cpt_query_wb_cursos_livres_table($cursos_livres_satc_in_cpt_array) {
	global $wpdb;
	$table_name = 'wb_cursos_livres';
	
	if(NULL === $cursos_livres_satc_in_cpt_array || 0 === $cursos_livres_satc_in_cpt_array || '0' === $cursos_livres_satc_in_cpt_array || empty($cursos_livres_satc_in_cpt_array)){
	    $results = $wpdb->get_results("SELECT * FROM $table_name");
	    return $results;
	} else {
	    $ids = implode(",", $cursos_livres_satc_in_cpt_array);
	    $sql = "SELECT * FROM $table_name WHERE id_curso NOT IN ($ids)";
	    $results = $wpdb->get_results($sql);
	    return $results;
	}
	
}

function cpt_insert_into_wb_cursos_livres_cpt() {
    
    global $wpdb;
	$table_name = 'wb_cursos_livres';
    
    $cursos_livres_satc_in_cpt_array = cpt_check_for_similar_meta_ids();
    
    $database_results = cpt_query_wb_cursos_livres_table($cursos_livres_satc_in_cpt_array);
    // var_dump($database_results);
    
    if(NULL === $database_results || 0 === $database_results || '0' === $database_results || empty($database_results)){
	   // $results = $wpdb->get_results("SELECT * FROM $table_name");
	    return;
	}
    
    foreach($database_results as $result) {

        $postarr = array(
            'post_title'  => wp_strip_all_tags($result->titulo),
            'meta_input'  => array(
                'id_curso'              => $result->id_curso,
                'titulo'                => $result->titulo,
                'objetivo'              => $result->objetivo,
                'conteudo_prog'         => $result->conteudo_prog,
                'mais_informacoes'      => $result->mais_informacoes,
                'texto_complementar'    => $result->texto_complementar,
                'imagem'                => $result->imagem,
                'i_turma'               => $result->i_turma,
                'carga_horaria'         => $result->carga_horaria,
                'dt_realizacao_ini'     => $result->dt_realizacao_ini,
                'dt_realizacao_fim'     => $result->dt_realizacao_fim,
                'i_area'                => $result->i_area,
                'modalidade'            => $result->modalidade,
                'local'                 => $result->local,
                'link_curso'            => $result->link_curso,
                'dt_sistema'            => $result->dt_sistema,
                'chamada_destaque'      => $result->chamada_destaque,
            ),
            'post_type'   => 'cursos_livres_satc',
            'post_status' => 'publish',
            
        );
    
        wp_insert_post($postarr);
        
    }

}
add_action('wp', 'cpt_insert_into_wb_cursos_livres_cpt');

?>