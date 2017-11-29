  Ext.define('SystemAsset.Assetcategory.model.M_assetcategory', {
    extend: 'Ext.data.Model',
    fields: ['CategoryID', 'CategoryName', 'CategoryDescription']
  });

  Ext.define('SystemAsset.Assetcategory.store.ST_assetcategory', {
    extend  : 'Ext.data.Store',
    model   : 'SystemAsset.Assetcategory.model.M_assetcategory',
    autoLoad : true,
    autoSync: true,
    proxy: {
        type: 'ajax',
        actionMethods: 'POST',
        api: {
            create: base_url + 'Assetcategory/create',
            read: base_url + 'Assetcategory/read',
            update: base_url + 'Assetcategory/update',
        },
        reader: {
            type: 'json',
            rootProperty: 'Rows',
            totalProperty: 'TotalRows',
            successProperty: 'success'
        },
        writer: {
            type: 'json',
            writeAllFields: false
        }
    }
  });
