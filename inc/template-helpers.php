<?php
/**
 * Custom helper functions to be used in template files
 *
 * @package Bloggar
 * @author Tatenda Munenge
 * @since 1.0.1
 */


 if( !function_exists('blogger_get_menu_children')){

    function blogger_get_menu_children($menu_array, $menu_id){
        $child_menus = [];
        foreach($menu_array as $menu_item){
            if($menu_item->menu_item_parent == $menu_id){
                $child_menus[] = $menu_item;
            }
        }
        return $child_menus;
    }
 }

 if( !function_exists('blogger_get_menu_by_location')){

    /**
     * function to fetch menus as array
     * @param String $menu_location
     * @return Array $menu
     * @since 1.0.1
     * @see https://developer.wordpress.org/reference/functions/wp_get_nav_menu_items/
     */

     function blogger_get_menu_by_location($menu_location,$allow_children = true){
        /**
         * Fetch menu ID
         */
        $locations = get_nav_menu_locations();
        $menu_id = $locations[$menu_location] ?? null;
        $menu_array = [];
		
        if(empty($menu_id) || $menu_id ==null){
            return [];
        }

        $menu_items = wp_get_nav_menu_items( $menu_id );

        if($allow_children == false){
            $menu_items;
        }

        foreach($menu_items as $item){

            if( $item->menu_item_parent > 0){
                continue;
            }
            
            $children = blogger_get_menu_children($menu_items, $item->ID);
            $temp['menu_item'] = $item;
            $temp['has_children'] =  (  empty($children) ? false : true );
            $temp['children'] = [];
            
            foreach( $children as $child){
                $grand_children =   blogger_get_menu_children($menu_items, $child->ID);
                $child_payload['menu_item'] = $child;
                $child_payload['has_children'] =  (  empty( $grand_children) ? false : true );
                $child_payload['children'] = $grand_children;
                $temp['children'][] = $child_payload;
            }

            $menu_array[] = $temp;
        }

        return $menu_array;
    
     }
 }