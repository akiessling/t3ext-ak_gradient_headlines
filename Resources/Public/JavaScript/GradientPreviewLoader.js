/*
 * This file is part of the TYPO3 CMS project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */

/**
 * Implementation of the value slider for input text elements.
 *
 * Module: TYPO3/CMS/AkGradientHeadlines/GradientPreview
 */
define(['AkGradientHeadlines/Vue', 'AkGradientHeadlines/GradientWidget'], function() {
    var GradientPreview = {};

    GradientPreview.init = function (id) {
        var holder = document.getElementById(id);
        var element = document.createElement('gradient-configurator');
        var uid = holder.dataset.uid;

        element.setAttribute('color1', holder.dataset.color1 || '#000000');
        element.setAttribute('color2', holder.dataset.color2 || '#000000');
        element.setAttribute('angle', holder.dataset.angle || 90);

        element.addEventListener("gradient-change", function(event) {
            var data = event.detail[0];
            var table = 'tx_akgradientheadlines_domain_model_gradient';

            GradientPreview.updateTcaField(table, uid, 'angle', data.angle);
            GradientPreview.updateTcaField(table, uid, 'start_color', data.color1);
            GradientPreview.updateTcaField(table, uid, 'end_color', data.color2);
        });

        holder.appendChild(element);
    };

    GradientPreview.updateTcaField = function(table, uid, field, value) {
        var el = 'data[' + table + '][' + uid + '][' + field + ']';
        var fieldTarget = $('[data-formengine-input-name="' + el + '"]');



        fieldTarget.val(value);
        TBE_EDITOR.fieldChanged(table, uid, field, value, el);
    };
    return GradientPreview;
});