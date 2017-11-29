  Ext.define('SystemAsset.Assetsublocation.model.M_assetsublocation', {
    extend: 'Ext.data.Model',
    fields: ['SublocID', 'LocName', 'SubLocname', 'SubDescription']
  });

  Ext.define('SystemAsset.Assetsublocation.store.ST_assetsublocation', {
    extend  : 'Ext.data.Store',
    model   : 'SystemAsset.Assetsublocation.model.M_assetsublocation',
    autoLoad : true,
    autoSync: true,
    proxy: {
        type: 'ajax',
        actionMethods: {create: 'POST',read: 'POST',update: 'POST',destroy: 'POST'},
        api: {
            create: base_url + 'Assetsublocation/create',
            read: base_url + 'Assetsublocation/read',
            update: base_url + 'Assetsublocation/update',
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
