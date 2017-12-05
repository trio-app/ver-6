Ext.define('SystemAsset.Stobycostcenter.controller.C_stobycostcenter', {
    extend  : 'Ext.app.Controller',
    init: function () {
      this.control({
        'GRID_stobycostcenter> toolbar > button[action=export]': {
          click: this.exportData
        }
      });
    },  
    exportData: function(){
        var link = base_url + 'Stobycostcenter/exportExcel';
        Ext.Ajax.request({
            url: link,
            success: function(transport){ 
                window.open(link); 
            },
            async: false
        });
    }     
  });
