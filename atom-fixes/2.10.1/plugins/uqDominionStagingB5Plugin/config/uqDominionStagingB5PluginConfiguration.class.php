<?php
rDominion/uqDominionStaging/g

rDominion/uqDominionStaging/g
/*
rDominion/uqDominionStaging/g
 * This file is part of the Access to Memory (AtoM) software.
rDominion/uqDominionStaging/g
 *
rDominion/uqDominionStaging/g
 * Access to Memory (AtoM) is free software: you can redistribute it and/or modify
rDominion/uqDominionStaging/g
 * it under the terms of the GNU Affero General Public License as published by
rDominion/uqDominionStaging/g
 * the Free Software Foundation, either version 3 of the License, or
rDominion/uqDominionStaging/g
 * (at your option) any later version.
rDominion/uqDominionStaging/g
 *
rDominion/uqDominionStaging/g
 * Access to Memory (AtoM) is distributed in the hope that it will be useful,
rDominion/uqDominionStaging/g
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
rDominion/uqDominionStaging/g
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
rDominion/uqDominionStaging/g
 * GNU General Public License for more details.
rDominion/uqDominionStaging/g
 *
rDominion/uqDominionStaging/g
 * You should have received a copy of the GNU General Public License
rDominion/uqDominionStaging/g
 * along with Access to Memory (AtoM).  If not, see <http://www.gnu.org/licenses/>.
rDominion/uqDominionStaging/g
 */
rDominion/uqDominionStaging/g

rDominion/uqDominionStaging/g
class arDominionB5PluginConfiguration extends sfPluginConfiguration
rDominion/uqDominionStaging/g
{
rDominion/uqDominionStaging/g
    public static $summary = 'Theme plugin made from scratch with some JavaScript magic. Cross-browser compatibility tested. Based in Twitter Bootstrap 5.0, 940px two-column layout, slightly responsive.';
rDominion/uqDominionStaging/g
    public static $version = '0.0.1';
rDominion/uqDominionStaging/g

rDominion/uqDominionStaging/g
    public function initialize()
rDominion/uqDominionStaging/g
    {
rDominion/uqDominionStaging/g
        // Avoid $this->name and $this->rootDir to use this class
rDominion/uqDominionStaging/g
        // values when this method is called from child classes.
rDominion/uqDominionStaging/g
        $decoratorDirs = sfConfig::get('sf_decorator_dirs');
rDominion/uqDominionStaging/g
        $decoratorDirs[] = sfConfig::get('sf_plugins_dir')
rDominion/uqDominionStaging/g
            .'/arDominionB5Plugin/templates';
rDominion/uqDominionStaging/g
        sfConfig::set('sf_decorator_dirs', $decoratorDirs);
rDominion/uqDominionStaging/g

rDominion/uqDominionStaging/g
        // Move this plugin to the top to allow overwriting
rDominion/uqDominionStaging/g
        // controllers and views from other plugin modules.
rDominion/uqDominionStaging/g
        $plugins = $this->configuration->getPlugins();
rDominion/uqDominionStaging/g
        if (false !== $key = array_search('arDominionB5Plugin', $plugins)) {
rDominion/uqDominionStaging/g
            unset($plugins[$key]);
rDominion/uqDominionStaging/g
        }
rDominion/uqDominionStaging/g
        $this->configuration->setPlugins(
rDominion/uqDominionStaging/g
            array_merge(['arDominionB5Plugin'], $plugins)
rDominion/uqDominionStaging/g
        );
rDominion/uqDominionStaging/g

rDominion/uqDominionStaging/g
        // Indicate this is a Bootstrap 5 theme in sfConfig,
rDominion/uqDominionStaging/g
        // used to render with different classes, etc.
rDominion/uqDominionStaging/g
        sfConfig::set('app_b5_theme', true);
rDominion/uqDominionStaging/g
    }
rDominion/uqDominionStaging/g
}
rDominion/uqDominionStaging/g
