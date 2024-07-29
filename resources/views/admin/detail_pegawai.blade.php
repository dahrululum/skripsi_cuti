<table class=" col-12">
    <tr>
        <td class="col-sm-4">Nama   </td>
        <td class="col-sm-1">:</td>
        <td> {{ $peg->nama_pegawai }}</td>
    </tr>
    <tr>
        <td class="col-sm-4">NIP   </td>
        <td class="col-sm-1">:</td>
        <td> {{ $peg->nip }}</td>
    </tr>
    <tr>
        <td class="col-sm-4">Unit Kerja   </td>
        <td class="col-sm-1">:</td>
        <td> {{ $peg->getUN->nm_unitkerja }}</td>
    </tr>
    <tr>
        <td class="col-sm-4">Jabatan   </td>
        <td class="col-sm-1">:</td>
        <td> {{ $peg->getJAB->nm_jabatan }}</td>
    </tr>
    <tr>
        <td class="col-sm-4">Pangkat/Gol   </td>
        <td class="col-sm-1">:</td>
        <td> {{ $peg->getPANG->nm_pangkat }} - {{ $peg->getGOL->nm_golongan }}</td>
    </tr>
    <tr>
        <td class="col-sm-4">No.HP   </td>
        <td class="col-sm-1">:</td>
        <td> {{ $peg->nohp }}</td>
    </tr>
    <tr>
        <td class="col-sm-4">Alamat   </td>
        <td class="col-sm-1">:</td>
        <td> {{ $peg->alamat }}</td>
    </tr>
    <tr>
        <td class="col-sm-4" colspan="3"> &nbsp; </td>
         
    </tr>
     
    
</table>
              
             