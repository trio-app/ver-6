Ext.define('SystemAsset.Stobygroup.controller.C_stobygroup', {
    extend  : 'Ext.app.Controller',
    init: function () {
      this.control({
        'GRID_stobygroup > toolbar > button[action=export]': {
          click: this.exportData
        }
      });
    },  
    exportData: function(){
        var link = base_url + 'Stobygroup/exportExcel';
        Ext.Ajax.request({
            url: link,
            success: function(transport){ 
                window.open(link); 
            },
            async: false
        });
    }     
  });
