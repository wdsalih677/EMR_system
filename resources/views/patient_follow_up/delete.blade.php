 <div class="modal fade" id="deleteFolow{{ $value->id }}" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                    id="exampleModalLabel">
                                    حذف المريض
                                </h5>
                                <button type="button" class="close" data-dismiss="modal"
                                    aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('patient_follow_up.destroy',$value->id) }}" method="POST">
                                    {{ method_field('Delete') }}
                                    @csrf
                                    هل تريد الحذف؟
                                    <input id="id" type="hidden" name="id"  value="{{ $value->id }}" class="form-control">
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">إغلاق</button>
                                        <button type="submit"
                                            class="btn btn-danger">حذف</button>
                                    </div>
                                </form>
                            </div>
                
                        </div>
                    </div>
                </div>