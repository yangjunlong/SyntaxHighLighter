<?php
/*
 * just test example
 * 
 * @author  Yang,junlong at 2015-11-19 0:16:01 build.
 * @version $Id$
 */

require 'SyntaxHighLighter.php';

$css_code = "procedure llp_ui_work.cxgrdbtblvwcxGrid1DBTableView1DblClick(
  Sender: TObject);
begin
  if Not qry1.Active then Exit ;
  if qry1.IsEmpty then Exit ;
  if Not btn1.Visible then
  begin
    Application.MessageBox('无法取入数据',
      '提示',MB_OK+mb_iconinformation) ;
    Exit ;
  end;
  qry2.Filtered := False ;
  qry2.Filter := 'xuhao = '+qry1.FieldByName('xuhao').AsString ;
  qry2.Filtered := True ;
  ShowCustomerDetail(qry2.FieldByName('xuhao').AsInteger);
end;";

echo SyntaxHighLighterFactory::parse($css_code, 'delphi');
