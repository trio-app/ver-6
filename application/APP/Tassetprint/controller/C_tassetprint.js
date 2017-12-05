    Ext.define('SystemAsset.Tassetprint.controller.C_tassetprint', {
        extend: 'Ext.app.Controller' ,            
        init: function () {
            this.control({
              'GRID_tassetprint > toolbar > button[action=printbarcode]': {
                
                click: this.printbarcode
              }
            });
        },
        printbarcode: function(){    
            
        var grid = Ext.getCmp('GRID_tassetprint');
        var selection = grid.getSelectionModel().getSelection();
            

        var config = getUpdatedConfig();
        if(grid.getSelectionModel().getCount() > 0){
            var printData = [];
                for(key in selection){
                    printData.push([
                        '^XA\n',
                        '^MMT\n',
                        '^MD9\n',
                        '^PW550\n',
                        '^LL0160\n',
                        '^LS0\n',
                        '^FT17,151^BQN,5,5\n',
                        '^FDMA,' + selection[key]['data']['AssetNo'] + '^FS\n',
                        '^FT132,49^A0N,26,26^FH\^FDASSET PEMI AW^FS',
                        '^FT132,86^A0N,24,24^FH\^FD' + selection[key]['data']['AssetName'] + '^FS\n',
                        '^FT350,150^A0N,20,19^FH\^FD' + selection[key]['data']['AssetNo'] + '^FS\n',
                        '^PQ1,0,1,Y\n',
                        '^XZ\n'
                    ]);
                }
                console.log(printData);
                qz.print(config, printData).catch(displayError);
        }else{
            Ext.MessageBox.show({
                title: 'Print Failed',
                msg: 'Tidak ada Asset yang Dipilih',
                buttons: Ext.MessageBox.OK,
                icon: 'info'
           }); 
        }
        }

        
    });