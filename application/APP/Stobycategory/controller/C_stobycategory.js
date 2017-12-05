Ext.define('SystemAsset.Stobycategory.controller.C_stobycategory', {
    extend  : 'Ext.app.Controller',
    init: function () {
      this.control({
        'GRID_stobycategory> toolbar > button[action=export]': {
          click: this.exportData
        }
      });
    },  
    exportData: function(){
        var link = base_url + 'Stobycategory/exportExcel';
        Ext.Ajax.request({
            url: link,
            success: function(transport){ 
                window.open(link); 
            },
            async: false
        });
    }     
  });
