Ext.define('SystemAsset.Stobypic.controller.C_stobypic', {
    extend  : 'Ext.app.Controller',
    init: function () {
      this.control({
        'GRID_stobypic > toolbar > button[action=export]': {
          click: this.exportData
        }
      });
    },  
    exportData: function(){
        var link = base_url + 'Stobypic/exportExcel';
        Ext.Ajax.request({
            url: link,
            success: function(transport){ 
                window.open(link); 
            },
            async: false
        });
    }     
  });
