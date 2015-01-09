<?php namespace juan2ramos\Components\Menu;

use juan2ramos\Entities\Menu;

class MenuBuilder
{

    private $nameMenu;
    private $cssMenu;
    private $permissions;

    public function getMenu($nameMenu, $cssMenu = 'menu')
    {
        $this->nameMenu = $nameMenu;
        $this->cssMenu = $cssMenu;
        $this->permissions = \ACL::getPermissions(3);

        return $this->styleMenu($this->createMenu());
    }

    private function styleMenu($menu)
    {
        return $menu;
    }

    private function createMenu()
    {
        $menu = Menu::where('nameMenu', '=', $this->nameMenu)
            ->orderby('orderMenu')
            ->get();
        $menuArray = array();
        foreach ($menu as $links) {
            $menuArray[] =
                array(
                    'id' => $links->id,
                    'nameLink' => $links->nameLink,
                    'route' => $links->route,
                    'permission' => $links->permission,
                    'parent' => $links->parent,
                );
        }
        $menuEnd = array(
            'items' => array(),
            'parents' => array()
        );
        foreach ($menuArray as $items) {
            $menuEnd['items'][$items['id']] = $items;
            $menuEnd['parents'][$items['parent']][] = $items['id'];
        }

        return $this->prepareMenu(0, $menuEnd);
    }

    private function prepareMenu($parent, $menu)
    {
        $html = "";
        if (isset($menu['parents'][$parent])) {
            $html .= "<ul>";
            foreach ($menu['parents'][$parent] as $itemId) {
                if(!$this->checkPermission($menu['items'][$itemId]['permission'])){
                    continue;
                };
                $html .= '<li>';
                $html .= $this->template($menu['items'][$itemId]);
                $html .= $this->prepareMenu($itemId, $menu);
                $html .= '</li>';
            }
            $html .= "</ul>  ";
        }
        return $html;
    }

    private function checkPermission($namePermission)
    {
        if(empty($namePermission)){return true;}
        return (array_key_exists( $namePermission, $this->permissions))
            ?($this->permissions[$namePermission]['available'])?true:false
            :false;

    }

    private function template($li)
    {
        $a = (!empty($li['route'])) ? $li['route'] : '#';
        return "<a href='$a' >" . $li['nameLink'] . '</a>';


    }
}