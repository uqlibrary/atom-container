<?php
rDominion/uqDominionProd/g

rDominion/uqDominionProd/g
/*
rDominion/uqDominionProd/g
 * This file is part of the Access to Memory (AtoM) software.
rDominion/uqDominionProd/g
 *
rDominion/uqDominionProd/g
 * Access to Memory (AtoM) is free software: you can redistribute it and/or modify
rDominion/uqDominionProd/g
 * it under the terms of the GNU Affero General Public License as published by
rDominion/uqDominionProd/g
 * the Free Software Foundation, either version 3 of the License, or
rDominion/uqDominionProd/g
 * (at your option) any later version.
rDominion/uqDominionProd/g
 *
rDominion/uqDominionProd/g
 * Access to Memory (AtoM) is distributed in the hope that it will be useful,
rDominion/uqDominionProd/g
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
rDominion/uqDominionProd/g
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
rDominion/uqDominionProd/g
 * GNU General Public License for more details.
rDominion/uqDominionProd/g
 *
rDominion/uqDominionProd/g
 * You should have received a copy of the GNU General Public License
rDominion/uqDominionProd/g
 * along with Access to Memory (AtoM).  If not, see <http://www.gnu.org/licenses/>.
rDominion/uqDominionProd/g
 */
rDominion/uqDominionProd/g

rDominion/uqDominionProd/g
class arDominionB5PluginConfiguration extends sfPluginConfiguration
rDominion/uqDominionProd/g
{
rDominion/uqDominionProd/g
    public static $summary = 'Theme plugin made from scratch with some JavaScript magic. Cross-browser compatibility tested. Based in Twitter Bootstrap 5.0, 940px two-column layout, slightly responsive.';
rDominion/uqDominionProd/g
    public static $version = '0.0.1';
rDominion/uqDominionProd/g

rDominion/uqDominionProd/g
    public function initialize()
rDominion/uqDominionProd/g
    {
rDominion/uqDominionProd/g
        // Avoid $this->name and $this->rootDir to use this class
rDominion/uqDominionProd/g
        // values when this method is called from child classes.
rDominion/uqDominionProd/g
        $decoratorDirs = sfConfig::get('sf_decorator_dirs');
rDominion/uqDominionProd/g
        $decoratorDirs[] = sfConfig::get('sf_plugins_dir')
rDominion/uqDominionProd/g
            .'/arDominionB5Plugin/templates';
rDominion/uqDominionProd/g
        sfConfig::set('sf_decorator_dirs', $decoratorDirs);
rDominion/uqDominionProd/g

rDominion/uqDominionProd/g
        // Move this plugin to the top to allow overwriting
rDominion/uqDominionProd/g
        // controllers and views from other plugin modules.
rDominion/uqDominionProd/g
        $plugins = $this->configuration->getPlugins();
rDominion/uqDominionProd/g
        if (false !== $key = array_search('arDominionB5Plugin', $plugins)) {
rDominion/uqDominionProd/g
            unset($plugins[$key]);
rDominion/uqDominionProd/g
        }
rDominion/uqDominionProd/g
        $this->configuration->setPlugins(
rDominion/uqDominionProd/g
            array_merge(['arDominionB5Plugin'], $plugins)
rDominion/uqDominionProd/g
        );
rDominion/uqDominionProd/g

rDominion/uqDominionProd/g
        // Indicate this is a Bootstrap 5 theme in sfConfig,
rDominion/uqDominionProd/g
        // used to render with different classes, etc.
rDominion/uqDominionProd/g
        sfConfig::set('app_b5_theme', true);
rDominion/uqDominionProd/g
    }
rDominion/uqDominionProd/g
}
rDominion/uqDominionProd/g
