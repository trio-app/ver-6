  Ext.define('SystemAsset.Stobycategory.model.M_stobycategory', {
      extend: 'Ext.data.Model',
      fields: ['AssetCategory','TotalAsset','AssetScanned','AssetNotScan']
    });
  Ext.define('SystemAsset.Stobycategory.store.ST_stobycategory', {
       extend  : 'Ext.data.Store',
       model   : 'SystemAsset.Stobycategory.model.M_stobycategory',
       //pageSize: 15,
       autoLoad : true,
       autoSync: true,
       proxy: {
           type: 'ajax',
           actionMethods:{read: 'POST'},
           api: {
               read: base_url + 'Stobycategory/read'
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
