  <table style="border: 1px solid;">
                       <thead>
                           <tr>
                                <th>Nama Pengeluaran</th>
                                <th>Jumlah</th>
                                <th>Keterangan</th>
                                <th>Penanggung Jawab / Sumber</th>
                                <th>Tipe</th>
                               {{-- <th>Deleted at</th> --}}
                               
                           </tr>
                       </thead>
                       
                       <tbody>
                           <?php
                           $no = 0;
                           ?>
                           
                            @forelse ($pencatatanKeuangan as $item)
                              <tr style="color: black">
                                  
                                  <td>{{ $item->nama }}</td>
                                  <td>Rp.{{ number_format($item->jumlah, 0) }}</td>
                                  <td>{{ $item->keterangan ? $item->keterangan : '-' }}</td>
                                  <td>{{ $item->from_to }}</td>
                                  <td style="text-transform:uppercase">{{ $item->tipe }}</td>
                                  
                              </tr>
                            @empty
                                <tr>
                                    <td colspan="9" style="text-align: center">
                                        <strong> 
                                            Tidak ada data
                                        </strong>
                                    </td>
                                </tr>
                            @endforelse
                           
                       </tbody>
                   </table>

              