  Ext.define('SystemAsset.Stobycostcenter.model.M_stobycostcenter', {
      extend: 'Ext.data.Model',
      fields: ['AssetCostcenter','TotalAsset','AssetScanned','AssetNotScan']
    });
  Ext.define('SystemAsset.Stobycostcenter.store.ST_stobycostcenter', {
       extend  : 'Ext.data.Store',
       model   : 'SystemAsset.Stobycostcenter.model.M_stobycostcenter',
       //pageSize: 15,
       autoLoad : true,
       autoSync: true,
       proxy: {
           type: 'ajax',
           actionMethods:{read: 'POST'},
           api: {
               read: base_url + 'Stobycostcenter/read'
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
