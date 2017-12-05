  Ext.define('SystemAsset.Stobylocation.model.M_stobylocation', {
      extend: 'Ext.data.Model',
      fields: ['AssetLocation','TotalAsset','AssetScanned','AssetNotScan']
    });
  Ext.define('SystemAsset.Stobylocation.store.ST_stobylocation', {
       extend  : 'Ext.data.Store',
       model   : 'SystemAsset.Stobylocation.model.M_stobylocation',
       //pageSize: 15,
       autoLoad : true,
       autoSync: true,
       proxy: {
           type: 'ajax',
           actionMethods:{read: 'POST'},
           api: {
               read: base_url + 'Stobylocation/read'
           },
           reader: {
               type: 'json',
               root: 'Rows',
               totalProperty: 'TotalRows',
               successProperty: 'success'
           },
           writer: {
               type: 'json',
               writeAllFields: false
           }
       }
     });
