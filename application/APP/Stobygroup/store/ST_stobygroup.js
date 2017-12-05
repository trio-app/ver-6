  Ext.define('SystemAsset.Stobygroup.model.M_stobygroup', {
      extend: 'Ext.data.Model',
      fields: ['AssetGroup','TotalAsset','AssetScanned','AssetNotScan']
    });
  Ext.define('SystemAsset.Stobygroup.store.ST_stobygroup', {
       extend  : 'Ext.data.Store',
       model   : 'SystemAsset.Stobygroup.model.M_stobygroup',
       //pageSize: 15,
       autoLoad : true,
       autoSync: true,
       proxy: {
           type: 'ajax',
           actionMethods:{read: 'POST'},
           api: {
               read: base_url + 'Stobygroup/read'
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
