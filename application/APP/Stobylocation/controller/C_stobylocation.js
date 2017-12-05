Ext.define('SystemAsset.Stobylocation.controller.C_stobylocation', {
    extend  : 'Ext.app.Controller',
    init: function () {
      this.control({
        'GRID_stobylocation > toolbar > button[action=export]': {
          click: this.exportData
        }
      });
    },  
    exportData: function(){
        var link = base_url + 'Stobylocation/exportExcel';
        Ext.Ajax.request({
            url: link,
            success: function(transport){ 
                window.open(link); 
            },
            async: false
        });
    }     
  });
