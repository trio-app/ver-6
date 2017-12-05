  Ext.define('SystemAsset.Reportsto.controller.C_reportsto', {
    extend  : 'Ext.app.Controller',
    init: function () {
        this.control({
            'gridreportasset > toolbar > button[action=export]': {
          click: this.exportData
            },
            
      });
    },
    exportData: function(){
        var link = baseurl + 'Reportsto/exportAsset';
        Ext.Ajax.request({
            url: link,
            success: function(transport){ 
                window.open(link); 
            },
            async: false
        });
    }
    
  });